# QuizGen - A Comprehensive Quiz Management System

## Overview
QuizGen is a dynamic and user-friendly quiz management system designed to cater to the needs of both educators and learners. Built using **PHP**, **HTML**, **CSS**, and **JavaScript**, this system provides a seamless platform for generating, managing, and participating in quizzes. With intuitive interfaces and robust backend functionality, QuizGen simplifies quiz creation and enhances the learning experience.

---

## Features

### 1. User Features
- **User Authentication**:
  - Secure login and account management.
  - Profile settings for personalization.
- **Quiz Participation**:
  - Various question formats: MCQs, true/false, and short answer.
  - Real-time scoring and result display.
  - User-friendly quiz interface with easy navigation.

### 2. Teacher Features
- **Content Management**:
  - Add, edit, and delete quiz questions.
  - Manage quizzes and related content.
- **Paper Generator**:
  - Generate quiz papers dynamically based on user-defined criteria.
- **Result Tracking**:
  - View and manage quiz results efficiently.

### 3. Frontend Design
- **Pre-Designed Pages**:
  - Home, contact, and account pages.
  - Dedicated quiz pages with interactive UI.
- **Graphics and Icons**:
  - Professionally designed navigation icons and images for a polished look.
- **Responsive Design**:
  - Works seamlessly across devices for a consistent user experience.

### 4. Navigation and Social Integration
- **Navigation Bar**:
  - Intuitive and accessible navigation for easy movement across the site.
- **Social Media Integration**:
  - Pre-designed templates for integrating platforms like Facebook.

### 5. Backend Functionality
- **PHP-Powered Backend**:
  - Handles user authentication, quiz management, and content storage.
  - Robust error handling and secure data processing.
- **Quiz Storage**:
  - Scripts for storing and retrieving quiz data.
  - Efficient handling of quiz paper generation.

---

## File Structure

### Key Directories
- **`common/`**:
  - Shared pages like `account.php`, `contact.php`, and `home.php`.
- **`graphics/`**:
  - Contains icons and images for the UI.
- **`login/`**:
  - Handles user login functionality with `login.php` and `verify.php`.
- **`navigation-bar/`**:
  - Includes scripts for navigation bar functionality.
- **`quiz/`**:
  - Core quiz management scripts including:
    - `MCQsubjects.php`
    - `papergenerator.php`
    - `quizmcq.php`
    - `trueorfalse.php`
  - Subdirectories for quiz storage and testing.
- **`readymade/`**:
  - Pre-designed pages with HTML, CSS, and JavaScript files for quick deployment.
- **`socials/`**:
  - Social media templates and styles.
- **`teacher/`**:
  - Tools for teachers to manage quizzes, such as `add.php` and `edit_question.php`.

---

## Technologies Used
- **Frontend**:
  - HTML5, CSS3, JavaScript.
- **Backend**:
  - PHP for server-side scripting.
- **Database**:
  - MySQL for storing user and quiz data.
- **Graphics**:
  - PNG and JPG assets for icons and backgrounds.

---

## How to Set Up

1. **Requirements**:
   - A local server environment (e.g., XAMPP, WAMP, or MAMP).
   - PHP version 7.4 or above.
   - MySQL database.

2. **Installation Steps**:
   - Clone the repository:
     ```bash
     git clone https://github.com/vickygovekar/QuizGen.git
     ```
   - Move the project to your server’s root directory (e.g., `htdocs` for XAMPP).
   - Import the SQL database:
     - Locate the SQL file in the `database/` folder.
     - Import it using phpMyAdmin or your preferred MySQL tool.
   - Update the database credentials in the `config.php` file.

3. **Run the Application**:
   - Start your local server.
   - Access the project in your browser at `http://localhost/QuizGen`.

---

## Future Enhancements
- Add user progress tracking and analytics.
- Integrate additional question formats like drag-and-drop or fill-in-the-blank.
- Mobile application version for Android and iOS.
- Real-time multiplayer quiz functionality.

---

## Contributing
Contributions are welcome! Follow these steps to contribute:
1. Fork the repository.
2. Create a new branch:
   ```bash
   git checkout -b feature-name
   ```
3. Commit your changes:
   ```bash
   git commit -m "Add feature-name"
   ```
4. Push to the branch:
   ```bash
   git push origin feature-name
   ```
5. Submit a pull request.

---

## Contact
For any queries or suggestions, please contact:
- **Email**: vickygovekarreal@gmail.com
- **GitHub**: [vickygovekar](https://github.com/vickygovekar)

