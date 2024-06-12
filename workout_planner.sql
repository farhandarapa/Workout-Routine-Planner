-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2024 at 08:25 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `workout_planner`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'farhanqutie', '$2y$10$8tyCDKQtAnxcmBZmZrZwyutdpuZi9wgZh26VS099oiMKB7NyWnKWS');

-- --------------------------------------------------------

--
-- Table structure for table `workouts`
--

CREATE TABLE `workouts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workouts`
--

INSERT INTO `workouts` (`id`, `user_id`, `title`, `description`, `date`) VALUES
(6, 1, 'Monday Workout', 'Lower Body Strength Resistance Work\r\nUse handheld weights or machines. For squats and lunges, keep your weight in your heels or the center of your feet to prevent your knees from extending past your toes.\r\n\r\nSquats. Three sets of 10 reps\r\nLunges. Three sets of 12 reps (each leg)\r\nHamstring curls. Three sets of 12 reps\r\nAt home, substitute deadlifts, donkey kicks or hip presses with feet on the floor or a wall.\r\nCalf raises. Three sets of 15 reps', '2024-06-06'),
(7, 1, 'Tuesday Workout', 'Cardio and Core\r\nRun, hike or cycle. 45 minutes\r\nPlank. Three 30-second sets\r\nForearm plank with twists. Three sets of 15 reps\r\nMountain climbers. Three 1-minute sets\r\n', '2024-06-07'),
(8, 1, 'Wednesday Workout', 'Cardio and Mobility\r\nYoga. 30 minutes incorporating hip, shoulder, spine and ankle mobility movements.\r\nWalk briskly. 30 minutes', '2024-06-08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `workouts`
--
ALTER TABLE `workouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `workouts`
--
ALTER TABLE `workouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `workouts`
--
ALTER TABLE `workouts`
  ADD CONSTRAINT `workouts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
