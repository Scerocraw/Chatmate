# ChatMate

### ChatMate is a simple lightweight and responsive chatting software based on Kohana 3.2, CSS, jQuery, a very small database structure and some nodeJS (optional!).

### Installation
- Setup this project and call it in your browser under the configured domain
- There is a database configuration file in: `modules/database/config/database.php` - Make sure to replace `hostname`, `username` and `password` with a valid user! After that, you can import the master SQL Dump in `sql_import/` with the name `chatmate.sql`. 

### Vision
- Easily chat with your friends - everywhere and everytime you want! The dataTransmission between client (Your PC / Tablet / Phone) to the server is optimized - so you can chat with a very low internet connection!
- Future Features:

    - Installer script for a very easy installation setup
    - Create and maintain channles instead of one big channel
    - Command integration to kick / timeout other users when they offend other people
    - A better AdminInterface
    - Better support for scalability
    - Send E-Mails for registration / forgot password / etc.
    
### Important to know for an optiomal user experience

- There is already a user you can login with. `Username: "test", Password: "test"` - do NOT USE THIS USER in a production mode
- You can reach the admin interface by calling "/admin" after your server URL `(e.g.: localhost/admin)`

### Epilogue
##### You've found a bug or really want a new feature implemented? Feel free to create a new pull request on this repository!