   // Firebase configuration
   const firebaseConfig = {
    apiKey: "YOUR_API_KEY",
    authDomain: "YOUR_AUTH_DOMAIN",
    projectId: "YOUR_PROJECT_ID",
    storageBucket: "YOUR_STORAGE_BUCKET",
    messagingSenderId: "YOUR_SENDER_ID",
    appId: "YOUR_APP_ID"
};

// Initialize Firebase
firebase.initializeApp(firebaseConfig);

// Google Sign-In
document.getElementById('googleSignIn').addEventListener('click', () => {
    const provider = new firebase.auth.GoogleAuthProvider();
    
    firebase.auth()
        .signInWithPopup(provider)
        .then((result) => {
            // This gives you a Google Access Token
            const credential = firebase.auth.GoogleAuthProvider.credentialFromResult(result);
            const token = credential.accessToken;
            
            // The signed-in user info
            const user = result.user;
            
            // Redirect or do something with the user
            console.log(user);
            window.location.href = '/dashboard'; // Redirect to dashboard
        })
        .catch((error) => {
            // Handle Errors here.
            const errorCode = error.code;
            const errorMessage = error.message;
            // The email of the user's account used.
            const email = error.email;
            // The AuthCredential type that was used.
            const credential = firebase.auth.GoogleAuthProvider.credentialFromError(error);
            
            console.error(errorMessage);
            alert(errorMessage);
        });
});