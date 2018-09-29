INSERT INTO `users` (`id`, `username`) VALUES
(1, 'john'),
(2, 'tim'),
(3, 'mark'),
(5, 'peter'),
(6, 'anne'),
(13, 'jessica');

INSERT INTO `actions` (`id`, `description`) VALUES
(1, 'read article'),
(2, 'post article'),
(3, 'update article'),
(4, 'delete article'),
(5, 'change password'),
(6, 'change username');

INSERT INTO `visits` (`id`, `user_id`, `logged_in`, `logged_out`) VALUES
(1, 1, '2014-06-01 00:35:07', '2014-06-01 01:30:21'),
(2, 2, '2014-06-03 4:22:17', '2014-06-03 07:34:33'),
(3, 3, '2014-07-10 12:53:07', '2014-07-10 18:04:41'),
(4, 5, '2014-11-14 20:00:25', '2014-11-14 20:18:58'),
(5, 6, '2015-02-14 14:14:02', '2014-02-14 15:12:46'),
(6, 13, '2016-01-09 02:24:24', '2016-01-09 02:41:40');

INSERT INTO `actions_visits_pivot` (`action_id`, `visit_id`) VALUES
(1, '3'),
(1, '2'),
(2, '1'),
(3, '1'),
(3, '3'),
(3, '2'),
(4, '6'),
(4, '5'),
(5, '1'),
(5, '4'),
(6, '2'),
(6, '4');
