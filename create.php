<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>this is students</h1>
    <form action="students.php" method="post" enctype="multipart/form-data">
        <input type="text" placeholder="name" name="name" /><br>
        <input type="text" placeholder="degree" name="degree" /><br>
        <input type="text" placeholder="title" name="title" /><br>
        <input type="date" placeholder="date" name="date" /><br>
        <input type="number" placeholder="170070055" name="rollnumber" /><br>
        <input type="file" placeholder="date" name="avatarlocation" /><br>
        <input type="submit" value="Submit" />
    </form>


    <h1>this is Publications</h1>
    <form action="publications.php" method="post">
        <input type="text" placeholder="title" name="title" /><br>
        <input type="text" placeholder="author" name="authors" /><br>
        <input type="text" placeholder="journal" name="journal" /><br>
        <input type="text" placeholder="desc" name="description" /><br>
        <input type="submit" value="Submit" />
    </form>

    <h1>this is Projects</h1>
    <form action="projects.php" method="post">
        <input type="text" placeholder="title" name="title" /><br>
        <input type="text" placeholder="place" name="place" /><br>
        <input type="text" placeholder="role" name="role" /><br>
        <input type="text" placeholder="duration" name="duration" /><br>
        <input type="date" name="sdate" /><br>
        <input type="date" name="edate" /><br>
        <input type="submit" value="Submit" />
    </form>
    <h1>this is Experiences</h1>
    <form action="experiences.php" method="post">
        <input type="text" placeholder="position" name="position" /><br>
        <input type="text" placeholder="description" name="desc" /><br>
        <input type="date" name="sdate" /><br>
        <input type="date" name="edate" /><br>
        <input type="submit" value="Submit" />
    </form>
    <h1>this is Article</h1>
    <form action="article_submit.php" method="post">
        <input type="text" placeholder="Title" name="title" /><br>
        <input type="text" placeholder="Author" name="author" /><br>
        <input type="date" name="article_date" /><br>
        <input type="submit" value="Submit" />
    </form>
    <h1>this is awards</h1>
    <form action="awards.php" method="post">
        <input type="text" placeholder="Title" name="title" /><br>
        <input type="text" placeholder="description" name="desc" /><br>
        <input type="date" name="date" /><br>
        <input type="submit" value="Submit" />
    </form>
    <h1>this is conference</h1>
    <form action="conferences.php" method="post">
        <input type="text" placeholder="Title" name="title" /><br>
        <input type="text" placeholder="people" name="people" /><br>
        <input type="date" name="date" /><br>
        <input type="submit" value="Submit" />
    </form>
</body>

</html>