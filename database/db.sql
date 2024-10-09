CREATE DATABASE quiz_group;


CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `admin` BOOLEAN NOT NULL DEFAULT false,
  `score` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE quizzes (
    quiz_id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE questions (
    question_id INT PRIMARY KEY AUTO_INCREMENT,
    quiz_id INT,
    text TEXT NOT NULL,
    FOREIGN KEY (quiz_id) REFERENCES quizzes(quiz_id) ON DELETE CASCADE
);
CREATE TABLE options (
    option_id INT PRIMARY KEY AUTO_INCREMENT,
    question_id INT,
    option_text1 VARCHAR(255) NOT NULL,
    option_text2 VARCHAR(255) NOT NULL,
    option_text3 VARCHAR(255) NOT NULL,
    option_text4 VARCHAR(255) NOT NULL,
    is_correct BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (question_id) REFERENCES questions(question_id) ON DELETE CASCADE
);
CREATE TABLE answers (
    answer_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    quiz_id INT,
    question_id INT,
    option_id INT,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (quiz_id) REFERENCES quizzes(quiz_id) ON DELETE CASCADE,
    FOREIGN KEY (question_id) REFERENCES questions(question_id) ON DELETE CASCADE,
    FOREIGN KEY (option_id) REFERENCES options(option_id) ON DELETE CASCADE
);
CREATE TABLE `quiz_results` (
	`result_id` INT(10) NOT NULL AUTO_INCREMENT,
	`user_id` INT(10) NULL DEFAULT NULL,
	`quiz_id` INT(10) NULL DEFAULT NULL,
	`score` DECIMAL(5,2) NULL DEFAULT NULL,
	`completed_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`result_id`) USING BTREE,
	INDEX `user_id` (`user_id`) USING BTREE,
	INDEX `quiz_id` (`quiz_id`) USING BTREE,
	CONSTRAINT `quiz_results_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE NO ACTION ON DELETE CASCADE,
	CONSTRAINT `quiz_results_ibfk_2` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`quiz_id`) ON UPDATE NO ACTION ON DELETE CASCADE
)
COLLATE='utf8mb4_0900_ai_ci'
ENGINE=InnoDB
AUTO_INCREMENT=4
;

SELECT u.username, COALESCE(SUM(qr.score), 0) AS total_score 
FROM users u
LEFT JOIN quiz_results qr ON u.user_id = qr.user_id
GROUP BY u.user_id
ORDER BY total_score DESC
LIMIT 15;

CREATE TABLE `user_history` (
    `history_id` INT(10) NOT NULL AUTO_INCREMENT,
    `user_id` INT(10) NOT NULL,
    `action` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`history_id`),
    FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE
);


