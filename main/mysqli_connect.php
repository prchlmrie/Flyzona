<?php
$dbcon = @mysqli_connect('localhost', username: 'cheiloupuro', password: 'cheiloupuro', database: 'members_puro')
OR die('Could not connect to the MySQL Server: '. mysqli_connect_error());
# mysqli_set_charset($dbcon, 'utf-8');