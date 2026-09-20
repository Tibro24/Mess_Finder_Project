function setLoginState(isLoggedIn, userName) {
    const loggedOut = document.getElementById('loggedOutActions');
    const loggedIn = document.getElementById('loggedInActions');

    if (isLoggedIn){
        loggedOut.style.display = 'none';
        loggedIn.style.display = 'flex';

        // Show the first letter of the user's name in the avatar circle
        document.getElementById('avatarInitial').textContent = userName.charAt(0).toUpperCase();
    } else {
        loggedOut.style.display = 'flex';
        loggedIn.style.display = 'none';
    }
}