https://cs139.dcs.warwick.ac.uk/~u1909996/cs139/BillSplitter/main.php

NOTE - The link provided will take you to the website, hosted on the university compsci department server.
------------------------------------------------------

MAIN FEATURES

My application covers all of the basic functionality points in the specification:

- User registration; users are able to sign up with a name, email, and password.
- User authentication; users can log in to their accounts with their email and password.
- Adding a bill; users can add a new bill with a name and amount, as well as emails of up to 6 relevant parties.
- Splitting the bill between relevant parties; after a bill has been added it will be split and displayed to the users corresponding to the emails entered on bill submission.
- Settling payment between parties; there is an option to pay each individual bill and if you have paid a bill then you can also cancel the payment afterwards. If all relevant parties have paid a bill it will be deleted from the database and user(s) dashboard.
- Displaying the status of bills; user can see all bills that have not yet been fully paid by all parties, and whether or not they have paid their portion. User can also see the total payment that is required after summing the cost of all outstanding bills.
- Notification of a new bill, and monies owed; dashboard will display a bill and amount owed as soon as it is added to the database, and user will receive an email notification of bill being added.

'COMPLETE APPLICATION' CHECKPOINTS

Consistent styling:

- Maintains the same theme throughout, with different shades of blue used for most elements. Uses green colour for paid bills and red colour for unpaid bills. Buttons will glow when the cursor hovers over them (and will glow green or red depending on paying or cancelling bill respectively) and the cursor will also become a pointer indicating to a user that the button is clickable.

Usability and accessibility to disabled users:

- Makes use of labels for input boxes with a 'for' tag which will aid users that rely on text-to-speech to be able to understand what is going on when accessing a webpage.

Security issues:

- Passwords are hashed (using the email inputted as the salt) and then stored in the database so no one can extract plaintext passwords just from accessing the database.
- Uses parameterised queries to extract data from the database to defend against SQL injections that could maliciously affect the data stored in the database.
- Session authorisation after successful login allows access to bill dashboard meaning there is no way to access the bills page without first going through the login page, as any attempt to force access (such as just pasting the url to the bill page) will redirect you to login page if authorisation variable hasn't been set.

Make use of JavaScript:

- Uses a few javascript functions on the bill management page to have a dynamic bill input form. There is a toggle button which will display/hide the bill input form and there will be 3 email input boxes on show immediately. After pressing 'add person' there will show another email input box which replaces the aforementioned 'add person' button. This is able to happen 2 more times until all 6 possible email inputs are on show and all the 'add person' buttons have disappeared.

ADDITIONAL FEATURES

Validation, Verification, and Error messages:

- Password double input on registering to ensure that user doesn't accidentally sign up with the wrong password. And will display an error message if passwords don't match.

- Emails that are already saved in the database can't be used to register another account, and an error message will pop up if a user tries to sign up with an email already in use.

- If a user gives an incorrect login attempt (either wrong email/password or account doesn't exist) then access will be denied and an error message will show indicating that the login failed.

Session Control:

- There is a 'log out' button on the bill page which, when clicked, will wipe all session data and close the session before redirecting the user back to the login page. Ensuring no way back into the bill page without logging in again.

Dynamic Bill Page:

- When a bill is added, paid, cancelled, or removed, there is a running total of money owed that adjusts dynamically to user input on the page. 
- If all users associated with a bill have paid said bill then that bill will be deleted from the database and wiped from all parties' dashboards to indicate that the bill has been fully paid off by everyone. Thus removing the opportunity to 'cancel' payment.

Email Notifications:

- If a user adds a bill and inputs an email that is not stored in the database, that email address will receive an email with a link inviting that person to join the website and request them to register an account. If the user registers an account with that email then the bill will be immediately available for them to pay.
- Otherwise any emails inputted when adding a bill that are already registered with the website will receive an email notification telling them that a bill has been added, and how much they owe toward that bill.

------------------------------------------------------

DOCUMENTATION

3 webpages:

- main: 
        landing page for the site, prompts user to login.
        starts new php session, clicking login or register button will trigger login.php or register.php.
- register:
        allows a new user to register an account for billsplitter.
        email, password, and name all stored in database upon successful account creation.
        submitting registration details triggers savereg.php to process the inputs.
- bills: 
        signed in users can see their bills page with all outstanding bills listed.
        functionality to add more bills and pay for existing ones.
        findBills.php is included to search the database for all bills referencing the user's email and their payment status.


php scripts:

- addBill:
        when a user submits a new bill this will run and add the data to the database.
        if emails are not already attached to a user in the database then sends an email with a link to register.
        otherwise notify user via email that a new bill has been added.
- database:
        database class with helper functions to access and manipulate billsplit.db from php files.
- findBills:
        finds all the bills associated with an email and checks how much is owed for each and whether they have been paid.
        sums all the outstanding costs to provide a total amount to be paid.
- login:
        checks if login details exist in the database to allow the user to access their account.
        if login details are incorrect then show error message.
- logout:
        closes the session and returns user to the home page.
- pay:
        when user 'pays' for a bill the database gets updated to represent the payment being made.
        if all the people have paid for a bill then the bill will be deleted from the database.
- savereg: 
        allows a new user to register an account with email, password, and name.
        user can verify password with double entry to prevent typos.
        ensures an account cant be made with an email already in use.
        successful register will store data in database and redirect back to home page.
- unpay:
        user can 'cancel' a payment on a bill as long as it hasnt already been fully paid by everyone.

sql:

- schema:
        simple database schema with two tables, representing users and bills respectively.
        userID uniquely identifies users. username, encrypted password, and email stored for each user.
        billID uniquely identifies bills. name, total amount, number of people, and each email / payment status stored.

------------------------------------------------------
