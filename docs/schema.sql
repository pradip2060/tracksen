CREATE TABLE budgetsummary (
  ID int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  TotalSpent decimal(10,2) DEFAULT NULL,
  MonthlyBudget decimal(10,2) DEFAULT NULL,
  Savings decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE editexpenses (
  ID int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Category varchar(100) NOT NULL,
  Description varchar(255) NOT NULL,
  Date date NOT NULL,
  Amount decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE expenses (
  ID int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Category varchar(100) DEFAULT NULL,
  Description text DEFAULT NULL,
  Date date DEFAULT NULL,
  Amount decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE users (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name varchar(100) NOT NULL,
  profile_picture varchar(255) DEFAULT NULL,
  bio text DEFAULT NULL,
  email varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  created_at timestamp NOT NULL DEFAULT current_timestamp(),
  updated_at timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
