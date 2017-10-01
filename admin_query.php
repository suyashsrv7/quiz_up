<?php

	$query = "SELECT * FROM `users` WHERE 1";
	$users = many_rows($query);
	$num_users = count($users);

	$query = "SELECT * FROM `categories` WHERE 1";
	$categories = many_rows($query);
	$num_categories = count($categories);
	$table1 = 'users';

	$query = "SELECT topics.topic_name, categories.category_name, categories.category_id FROM topics INNER JOIN categories ON topics.category_id=categories.category_id";
	$topics = many_rows($query);
	$num_topics = count($topics);

	$query = "SELECT questions.question, questions.option_1, questions.option_2,questions.option_3,questions.option_4,questions.answer,topics.topic_name FROM questions INNER JOIN topics ON questions.topic_id=topics.topic_id";
	$questions = many_rows($query);
	$num_questions = count($questions);

?>
