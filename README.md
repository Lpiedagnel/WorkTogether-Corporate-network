# WorkTogether - Enterprise Social Network

## Project origin

WorkTogether is a social network designed for internal use within a company to strengthen interactions between employees.

Technically, the project is in PHP, following the conventions of the MVC architecture and object-oriented programming. The Pico.css library is used for styling, as well as the SASS preprocessor to facilitate CSS maintenance.

This repository is primarily a personal project aimed at practicing PHP. It is therefore not (in my opinion) quite ready for real-world use (we will come back to this), but some features may be added later.

![Login page of WorkTogether](https://imgur.com/fSAJ7wC.png)


## WorkTogether Features

WorkTogether is an enterprise social network with the following features:

- Sign up and login
- Post messages and comments
- Like a message
- Upload images for a message or user profile
- Edit or delete a message
- Follow an account and display followed or followers
- Administrator account with privileged access to the moderation panel
- Management of error messages

![Feed of WorkTogether](https://imgur.com/VYv80Gt.png)


## WorkTogether Installation

1. Download the Git repository.

2. Import the worktogether.sql file into PhpMyAdmin. The file will take care of creating the database if it doesn't already exist. This database already contains some test users, an administrator account, and a few messages/likes/follows.

3. Place the files from the repository in the folder of your web host or localhost.

4. No dependencies are required. Pico.css is imported via CDN.

5. If necessary, change the database access in the `src/Database.php` file. By default, the host name is "localhost," the username is "root," and there is no password.

6. Congratulations! You can now use the application! For simplicity, all default accounts in the exported database have the password `test1`. This is also the case for the administrator account (obviously, change these passwords if you plan to use the application in production).

### Admin account

For the admin account, the credentials are as follows:
Email: `admin@worktogether.com`
Password: `test1`

![Admin Page of WorkTogether](https://imgur.com/91QKPuz.png)


## Improvement areas
While WorkTogether has many features, there are still a few areas that need improvement before it can be considered for actual use.

* Firstly, in the context of internal use within a company, it may be interesting to have the administrator validate an account before the user can log in and use the application. This secures the application and prevents external individuals from logging in.

* A "Keep me logged in" button (using a cookie system, for example) can greatly improve the user experience. However, this is a structural modification and would deserve a separate branch.

* Limiting the number of requests to avoid the risk of DDOS.

* Using AJAX to not display the entire feed of messages directly.

* Adding a paging system (for the privacy policy, for example).

* Regarding design, Pico.css is a good library for building small, nice-looking applications. However, for a social network, more CSS manipulation is required to have a more optimal and responsive layout.

Many other features can be imagined. But for a project whose main purpose is to practice object-oriented programming in PHP, the current repository is sufficient. However, I may add more features later.

In conclusion, WorkTogether is a good training tool. And I recommend that you try to create your own social network if you want to practice.

All that remains is for me to wish you happy coding!

![Update Profil for WorKTogether](https://imgur.com/Em2DnkP.png)
