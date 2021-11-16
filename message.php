<?php
namespace roger\message;

/**
 * Method to create a new message
 * @param string $title Title of the message
 * @param string $content Content of the message
 */
function getMessage(string $title,string $content){
    echo "<div class=\"message\">";
    echo "<div class=\"close_message\">&#10006</div>";
    echo "<div class=\"title\"><h2>$title</h2></div>";
    echo "<div class=\"content\"><p>$content</p></div>";
    echo "</div>";
    echo "<script src=\"js/block_content.js\"></script>";
}