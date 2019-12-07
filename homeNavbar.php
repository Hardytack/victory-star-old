<?php if(isset($_SESSION["TCGLoggedIn"])) {
    $profileLink = "<li><a href='profile.php?username=".$_SESSION["TCGLoggedIn"]."'>My Profile</a></li>";
} else {
    $profileLink = "";
}

?>

<div class="headerBox">
    <h2>Victory Star!</h2>
    <p>The #1 Pokemon TCG Collectors Hub!</p>
</div>

<div id="navbar" class="clearfix">
    <div id="navP1">
        <a href="index.php">Home</a>
        <a href="http://victorystar.podbean.com">Podcast</a>
        <a href="blog.php">Blog</a>
        <div class="dropdown">
            <button class="dropbtn navButton">Formats</button>
            <div class="dropdownContent">
                <a href="sets.php?format=standard"  class="dropdownMenu navButton">Standard</a>   
                <a href="sets.php?format=expanded" class="dropdownMenu navButton">Expanded</a>
                <a href="sets.php?format=unlimited" class="dropdownMenu navButton">Unlimited</a>
                <a href="sets.php" class="dropdownMenu">All Sets</a>
            </div>
        </div>
        <form method="get" action="cardSearch.php" id="homeSearch">
            <input type="text" name="name" id="name" placeholder="Search a Card Name...">
            <button type="submit">Search</button>
        </form>
    </div>
    <div id="navP2">
        <?php
        if(isset($_SESSION["TCGLoggedIn"])) {
            $query = $con->prepare("SELECT * FROM users WHERE level = 'Admin' AND username = :un");
            $query->bindParam(":un", $_SESSION["TCGLoggedIn"]);
            $query->execute();
            if($query->rowCount() > 0) {
                echo "<!--<a href='admin.php'>Admin Page</a>-->
                      <div class='dropdown navButton'>
                        <button class='dropbtn dropbtnBigger'>".$_SESSION["TCGLoggedIn"]."</button>
                        <div class='dropdownContent2'>
                            <a href='admin.php' class='dropdownMenu'>Admin Page</a>  
                            <a href='profile.php?username=".$_SESSION["TCGLoggedIn"]."'class='dropdownMenu'>My Profile</a>
                            <a href='settings.php' class='dropdownMenu'>Settings</a>
                            <a href='logout.php' class='dropdownMenu'>Logout</a>
                        </div>
                        </div>
                      
                      <!--<a href='profile.php?username=".$_SESSION["TCGLoggedIn"]."'>My Profile</a>
                      <a href='logout.php'>Logout</a>-->";
            } else {
                echo "<!--<a href='admin.php'>Admin Page</a>-->
                      <div class='dropdown navButton'>
                        <button class='dropbtn dropbtnBigger'>".$_SESSION["TCGLoggedIn"]."</button>
                        <div class='dropdownContent2'> 
                            <a href='profile.php?username=".$_SESSION["TCGLoggedIn"]."'class='dropdownMenu'>My Profile</a>
                            <a href='settings.php' class='dropdownMenu'>Settings</a>
                            <a href='logout.php' class='dropdownMenu'>Logout</a>
                        </div>
                        </div>
                      
                      <!--<a href='profile.php?username=".$_SESSION["TCGLoggedIn"]."'>My Profile</a>
                      <a href='logout.php'>Logout</a>-->";
            }
        } else {
            echo "<a href='signin.php'>Login</a>
                <a href='signup.php'>Sign Up</a>";
        }
   
    ?> 
    </div>
</div>


<!--<header class="homeHeader">
    <ul>
        <li class="title"><a href="index.php">Hardys Pokemon World!</a></li>
        <li><a href="sets.php?format=standard">Standard</a></li>
        <li><a href="sets.php?format=expanded">Expanded</a></li>
        <li><a href="sets.php?format=unlimited">Unlimited</a></li>
        <?php echo $profileLink; ?>
    </ul>
    <?php
        if(isset($_SESSION["TCGLoggedIn"])) {
            $query = $con->prepare("SELECT * FROM users WHERE level = 'Admin' AND username = :un");
            $query->bindParam(":un", $_SESSION["TCGLoggedIn"]);
            $query->execute();
            if($query->rowCount() > 0) {
                echo "<a href='admin.php'><button type='button'  id='adminButton' class='btn btn-success'>Admin Page</button></a><a href='logout.php'><button type='button'  id='logoutButton' class='btn btn-danger'>Logout</button></a>";
                 echo $_SESSION["TCGLoggedIn"];
            } else {
                echo "<a href='logout.php'><button type='button'  id='logoutButton' class='btn btn-danger'>Logout</button></a>";
                 echo $_SESSION["TCGLoggedIn"];
            }
        } else {
            echo "<a href='signin.php'><button type='button'  id='loginButton' class='btn btn-success'>Login</button></a>
                <a href='signup.php'><button type='button'  id='adminButton' class='btn btn-success'>Sign Up</button></a>";
        }
   
    ?> 
     
</header>-->