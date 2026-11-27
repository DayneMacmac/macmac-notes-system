MACMAC NOTES SYSTEM
===================

Repository name: macmac-notes-system
Project title: Macmac Notes System
Required branch: sample-crud

WHAT THE SYSTEM DOES
- Create: add a note.
- Read: display all notes.
- Update: edit a note.
- Delete: remove a note.

FILES
- database.sql: creates the database and notes table with three sample notes.
- sample-crud/db.php: connects PHP to MySQL.
- sample-crud/index.php: displays all notes.
- sample-crud/create.php: adds a note.
- sample-crud/edit.php: updates a note.
- sample-crud/delete.php: deletes a note.

SETUP
1. Start Apache and MySQL in XAMPP.
2. Open http://localhost/phpmyadmin
3. Click Import, choose database.sql, then click Import/Go.
4. Put the macmac-notes-system folder inside C:\xampp\htdocs
5. Open http://localhost/macmac-notes-system/sample-crud/index.php

DATABASE CONNECTION
The included db.php uses:
Host: localhost
Username: root
Password: (blank)
Database: macmac_notes

If your MySQL root account has a password, open sample-crud/db.php and enter it in $password.

GITHUB
Create a public repository named macmac-notes-system.
Create and switch to a branch named sample-crud before adding these files.
Commit and push the sample-crud branch.
Create a pull request from sample-crud to main. Do not merge it unless instructed.
