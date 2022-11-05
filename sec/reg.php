<html>
    <header>
        <title>registration</title>
    </header>
<body>

<form method="post" action="cop/police/wanted.most.inc.php" enctype='multipart/form-data'>
    <input type="text" name="username" placeholder="username"><br>
    <input type="number" name="id_number" placeholder="id number"><br>
    <input type="phone" name="phone" placeholder="phone"><br>
    <input type="email" name="email"  placeholder="email address"><br>
    <select id="location" name="home_location" style="padding:5px" class="form-control" required="required" data-error="Please specify Location.">
        <option value="" disabled selected>Choose Your Area/Location</option>
        <option value="G-West">G-West</option>
        <option value="Phase2">Phase 2</option>
        <option value="Phase4">Phase 4</option>
        <option value="Braudhurst">Braudhurst</option>
        <option value="Bontleng">Bontleng</option>
        <option value="Block8">Block 8</option>
        <option value="Block7">Block 7</option>
        <option value="Village">Village</option>
    </select>

    <br>
    <input type="text" name="gender" placeholder="gender"><br>
    <input type="password" name="password" placeholder="password"><br>
    
    <input type="file" name="file"><br>
    <input type="submit" value="submit" name="submit-report"/>
</form>
</body>
</html>