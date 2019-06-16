# login-system
Basic login system for website applications, with CodeIgniter FrameWork

Config the app in 
      - application/config/config.php
          - base-url = default -> http://localhost/project-login (top of the code)
          - table_prefix = default -> project_login (bottom of the code)
      - application/config/database.php
          - hostname = default -> localhost
          - username = default -> root  
          - password = default -> 1234
          - database = default -> project_login
          
          
Upload the SQL code to the MySQLi database. Use your own table prefix or the default.
File -> project_login.sql in root.

Methods that can be useful. These are automatically loaded in your project if you are using CodeIgniter FrameWork.

    require_login();
      - This method will automatically redirect to the login site, if logged_in is false.
    alert_swal($message, $redirect_url);
      - This method gives you a SweetAlert2 alert box, with an error symbol. If $redirect_url is not given, then it won't redirect you to         anywhere. Message will be displayed in the center of the alert.
      
