// Firebase configuration
const firebaseConfig = {
    apiKey: "YOUR_API_KEY",
    authDomain: "YOUR_AUTH_DOMAIN",
    projectId: "YOUR_PROJECT_ID",
    storageBucket: "YOUR_STORAGE_BUCKET",
    messagingSenderId: "YOUR_MESSAGING_SENDER_ID",
    appId: "YOUR_APP_ID"
};

// Initialize Firebase
firebase.initializeApp(firebaseConfig);

// Google authentication
const provider = new firebase.auth.GoogleAuthProvider();

function loginWithGoogle() {
    firebase.auth().signInWithPopup(provider)
        .then(result => {
            const user = result.user;
            console.log('User logged in: ', user);
            // Add any additional login actions here
        })
        .catch(error => {
            console.error('Error during login: ', error);
        });
}
