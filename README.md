# Restaurant website
 
### Basic customer features
- Sending reservations to database
- Sending comments to database
- Looking through comments fetched from database
- Sending a message to database

### Moderator features
- Log in
  - username: admin
  - password: admin
  - comparison of input username and username stored in database (if exists)
  - if exists, comparison of hashed password input with a hashed password stored in database
  - if the login is successful, the id of admin is stored in a session
- Register a new admin
  - comparison of input username and username stored in database (if exists)
  - if exists, won't register - so there are no duplicates
- Check messages sent by customers
  - appearing after clicking on a button
- Check reservations created by customers
  - appearing after clicking on a button
- Edit reservations created by customers
- Delete reservations created by customers  
- Logout
  - destroy the session
  - redirect to main page
