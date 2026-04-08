<?php
session_start();

// Identifiants
$valid_username = "admin";
$valid_password = "football2024";

$error = "";

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if($username == $valid_username && $password == $valid_password) {
        $_SESSION['logged'] = true;
        header("Location:football-players/index.php");
        exit();
    } else {
        $error = "Identifiant ou mot de passe incorrect !";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - Football</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #1a472a, #0e2a1a);
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }
        /* Arrière-plan avec trophée */
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/FIFA_World_Cup_Trophy_%28cropped%29.JPG/800px-FIFA_World_Cup_Trophy_%28cropped%29.JPG') center/cover no-repeat;
            opacity: 0.2;
            z-index: 0;
        }
        .login-box {
            background: white;
            padding: 40px;
            border-radius: 20px;
            width: 380px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
            position: relative;
            z-index: 1;
        }
        h2 {
            text-align: center;
            color: #1a472a;
            margin-bottom: 30px;
            font-size: 28px;
        }
        .input-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }
        input {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 10px;
            font-size: 16px;
        }
        input:focus {
            border-color: #1a472a;
            outline: none;
        }
        button {
            width: 100%;
            padding: 12px;
            background: #1a472a;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background: #0e2a1a;
        }
        .error {
            background: #ffebee;
            color: #c62828;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }
        .info {
            text-align: center;
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px solid #eee;
            font-size: 12px;
            color: #666;
        }
        .demo {
            background: #f5f5f5;
            padding: 10px;
            border-radius: 8px;
            margin-top: 15px;
            text-align: center;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>🏆 Connexion</h2>
        
        <?php if($error): ?>
            <div class="error">❌ <?php echo $error; ?></div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <div class="input-group">
                <label>👤 Identifiant</label>
                <input type="text" name="username" placeholder="admin" required>
            </div>
            <div class="input-group">
                <label>🔒 Mot de passe</label>
                <input type="password" name="password" placeholder="football2024" required>
            </div>
            <button type="submit" name="login">Se connecter</button>
        </form>
        
        <div class="demo">
            🔑 Identifiants : <strong>admin</strong> / <strong>football2024</strong>
        </div>
        <div class="info">
            ⚽ Accès à la base de données des joueurs
        </div>
    </div>
</body>
</html>
