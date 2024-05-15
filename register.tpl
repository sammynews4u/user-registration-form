<h1> User Registration </h1>

<form action="register.php" method="post">
<label
for="username">Username:</label>
<input type="text"
name="username" required><br><br>
<label for="email">Email:</label>
<input type="email" name="email" required><br><br>
<label
for="pawwrod">Password:</label>
<input type="password" name="password" required><br><br>
<input type="submit"
name="submit" value="Register">
</form>

{if $message}
<p>{$message}</p>
{/if}