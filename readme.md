#shukkinbow

出勤退勤を管理するアプリ

URL : https://shukkinbow.herokuapp.com

デザイン : https://xd.adobe.com/view/603b1f48-9f2b-4116-92cb-c019b07f186f/


###動作環境
**local**
- laravel 5.4
- mysql 14.14

**heroku**
- Laravel 5.4
- postgresql 9.6.2


###手順
1. gmailアカウントでログイン
2. 勤務地（office,remote）を選択する
3. startボタンを押して勤務を開始する
4. 勤務終了のタイミングでstopボタンを押す
5. 出勤開始時間と終了時間、労働時間が表示される

### 構成
**session情報**

*google_id* : ログイン中のアカウント検索するよう

*attendance_id* : 勤務情報検索用、startミドルウェアでURL直打ち防止用

*count_flag* : 労働時間計測中かを判断するフラグ


<br>**AttendanceServiceクラス**

勤務情報に関するデータ群はこのクラスで扱う

<br>**middleware**

*google* : ログインしているか判断してしてなかったら / にリダイレクト

*start* : 勤務中でなければ /start へリダイレクト

 *count* : 労働時間計測中であれば /count にリダイレクト