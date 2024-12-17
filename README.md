
# QuizGen - Advanced Quiz Management System

## Overview
QuizGen is a sophisticated and feature-rich quiz management system that enables seamless quiz creation, participation, and evaluation. Designed for teachers, students, and administrators, QuizGen facilitates learning through an intuitive and efficient interface. The system is built using **PHP**, **HTML**, **CSS**, **JavaScript**, and integrates with **MySQL** for robust data handling.

---

## Features

### 1. User Roles and Functionalities
#### **Teachers**
- **Test Management**:
  - Create, edit, and delete quizzes.
  - Add and manage quiz questions (MCQs and subjective).
- **Result Tracking**:
  - View students' scores and quiz analytics.
- **Interactive Interface**:
  - Easily manage tests and questions through a user-friendly dashboard.

#### **Students**
- **Quiz Participation**:
  - Take quizzes across various subjects.
  - Real-time scoring for MCQs.
  - View results and feedback post-quiz.
- **Notifications**:
  - Receive updates and reminders for upcoming quizzes.

#### **Admins**
- **User Management**:
  - Add, edit, or delete users (teachers and students).
  - View and resolve queries from users.
- **System Monitoring**:
  - Manage and maintain platform integrity.

### 2. Core Functionalities
- **Question Bank**:
  - Store and retrieve questions for different quizzes and subjects.
- **Dynamic Quiz Generation**:
  - Generate quizzes automatically based on predefined parameters.
- **Responsive Design**:
  - Accessible across devices (mobile, tablet, desktop).

### 3. Visual Elements
- **Graphics and Icons**:
  - A variety of pre-designed icons and images for a polished and professional interface.
- **Navigation Bar**:
  - Intuitive navigation structure for seamless movement within the application.

---

## File Structure

### Key Directories and Files
- **`admin/`**: Manages user administration and queries.
  - `add_user.php`, `edit_user.php`, `view_queries.php`.
- **`teacher/`**: Handles teacher-specific functionalities like quiz creation.
  - `create_test.php`, `edit_question.php`, `view_tests.php`.
- **`quiz/`**: Core quiz mechanics.
  - `quiz.php`, `MCQsubjects.php`, `submit_quiz.php`.
- **`common/`**: Shared pages like `home.php`, `account.php`, `contact.php`.
- **`graphics/`**: Stores icons and images.
- **`login/`**: Handles user login and verification.
- **`navigation-bar/`**: Navigation scripts for seamless transitions.
- **`student/`**: Student-specific pages like `student.php`, `notification.php`.

---

## Technologies Used
- **Frontend**: HTML5, CSS3, JavaScript.
- **Backend**: PHP for server-side logic.
- **Database**: MySQL for secure and efficient data storage.
- **Graphics**: PNG and SVG for UI elements.

---

## How to Set Up

1. **Requirements**:
   - Local server software (e.g., XAMPP, WAMP).
   - PHP 7.4+ and MySQL.

2. **Installation**:
   - Clone the repository:
     ```bash
     git clone https://github.com/vickygovekar/Quizgen.git
     ```
   - Extract the files and move them to the `htdocs` directory (or equivalent).
   - Import the database:
     - Locate the SQL file and import it via phpMyAdmin.
   - Update the database credentials in the `config.php` file.

3. **Run the Application**:
   - Start the local server.
   - Access the system via `http://localhost/Quizgen`.

---

## Future Enhancements
- Implement advanced analytics for quiz performance.
- Add drag-and-drop and matching question types.
- Create a mobile app version for iOS and Android.
- Include real-time notifications and reminders.

---

## Contributing
We welcome contributions! Follow these steps:
1. Fork the repository.
2. Create a feature branch:
   ```bash
   git checkout -b feature-name
   ```
3. Commit your changes:
   ```bash
   git commit -m "Add feature-name"
   ```
4. Push the branch and submit a pull request.

---

## Contact
For questions or suggestions, contact:
- **Email**: vickygovekarreal@gmail.com
- **GitHub**: [yourusername](https://github.com/vickygovekar)
