<?php
include_once '../lib/database.php';
include_once "../classes/feedback.php";
$_POST = json_decode(array_keys($_POST)[0], true);
$email = str_replace("_", " ", $_POST['userEmail']);
$content = str_replace("_", " ", $_POST['userContent']);
$feedback = new feedback();
$insertFeedback = $feedback->insert_feedback($email, $content);

if ($insertFeedback) {
    echo true;
    exit;
}
echo 0;
