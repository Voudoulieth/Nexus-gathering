<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include '../src/view/head.inc.php' ?>
    <title>Votre profil</title>
  </head>
  <body>
    <?php include '../src/view/header.inc.php' ?>
    <main>
        <div>
            <img src="" alt="">
            <h1>Profil (Pseudo)</h1>
            <p>(status du compte)</p>
        </div>
        <form method="get" action="#">
            <button type="button" action="#"">Bibliothèque privée</button>
            <button type="button" action="#"">Vitrine publique</button>
            <button type="button" action="#"">Gestion de compte</button>
        </form>

        <div class="container">
            <div>
                <p>Bio</p>
                <p>Centre d'intérêt</p>
            </div>
            <div>
                <a href="#"><img src="" alt=""></a>
                <a href="#"><img src="" alt=""></a>
                <a href="#"><img src="" alt=""></a>
                <a href="#"><img src="" alt=""></a>
            </div>
            <div>
                <form action="">
                    <!-- valeur à prendre en paramètre : Rarement, occasionnellement, toutes les semaines, quotidiennement -->
                    <input type="radio" name="temps" id="rarely">
                    <label for="rarely">Rarement</label>
                    <input type="radio" name="temps" id="often">
                    <label for="often">Occasionnellement</label>
                    <input type="radio" name="temps" id="weekly">
                    <label for="weekly">Toutes les semaines</label>
                    <input type="radio" name="temps" id="daily">
                    <label for="daily">Quotidiennement</label>
                </form>
                <Div>
                    <p>
                        Niveau de jeux (récupéré via API)
                    </p>
                </Div>
            </div>
            <div>
                <form action="#" method="get">
                    <div>
                        <details>
                            <summary>Action</summary>
                            <input type="checkbox" name="combat" id="combat">
                            <label for="combat">Combat</label>
                            <input type="checkbox" name="plateformer" id="plateformer">
                            <label for="plateformer">Plateforme</label>
                            <input type="checkbox" name="fps" id="fps">
                            <label for="fps">FPS</label>
                            <input type="checkbox" name="shootemup" id="shootemup">
                            <label for="shootemup">Shoot them up</label>
                            <input type="checkbox" name="rail" id="rail">
                            <label for="rail">Rail Shooter</label>
                            <input type="checkbox" name="tps" id="tps">
                            <label for="tps">TPS</label>
                        </details>
                        <details>
                            <summary>Aventure</summary>
                            <input type="checkbox" name="textuel" id="textuel">
                            <label for="textuel">Fiction Interactive</label>
                            <input type="checkbox" name="graphique" id="graphique">
                            <label for="graphique">Point & click</label>
                            <input type="checkbox" name="flirt" id="flirt">
                            <label for="flirt">Simulation de drague</label>
                            <input type="checkbox" name="visual" id="visual">
                            <label for="visual">Visual Novel</label>
                            <input type="checkbox" name="sound" id="sound">
                            <label for="sound">Sound Novel</label>
                        </details>
                        <details>
                            <summary>Action-aventure</summary>
                            <input type="checkbox" name="infiltration" id="infiltration">
                            <label for="infiltration">Infiltration</label>
                            <input type="checkbox" name="horror" id="horror">
                            <label for="horror">Survival-horror</label>
                        </details>
                        <details>
                            <summary>Jeux de rôle</summary>
                            <input type="checkbox" name="arpg" id="arpg">
                            <label for="arpg">Action RPG</label>
                            <input type="checkbox" name="slash" id="slash">
                            <label for="slash">Hack'n'slash</label>
                            <input type="checkbox" name="rogue" id="rogue">
                            <label for="rogue">Rogue-like</label>
                            <input type="checkbox" name="mmo" id="mmo">
                            <label for="mmo">MMO</label>
                            <input type="checkbox" name="tactique" id="tactique">
                            <label for="tactique">RPG Tactique</label>
                        </details>
                        <details>
                            <summary>Réflexion</summary>
                            <input type="checkbox" name="maze" id="maze">
                            <label for="maze">Labyrinthe</label>
                            <input type="checkbox" name="puzzle" id="puzzle">
                            <label for="puzzle">Puzzle</label>
                            </details>
                        <details>
                            <summary>Simulation</summary>
                            <input type="checkbox" name="gestion" id="gestion">
                            <label for="gestion">Gestion</label>
                            <input type="checkbox" name="god" id="god">
                            <label for="god">God Game</label>
                            <input type="checkbox" name="vehicule" id="vehicule">
                            <label for="vehicule">Simulation de véhicule</label>
                        </details>
                        <details>
                            <summary>Stratégie</summary>
                            <input type="checkbox" name="tour" id="tour">
                            <label for="tour">Stratégie tour par tour</label>
                            <input type="checkbox" name="realtime" id="realtime">
                            <label for="realtime">Stratégie en temps réel</label>
                            <input type="checkbox" name="grande" id="grande">
                            <label for="grande">Grande Stratégie</label>
                            <input type="checkbox" name="4x" id="4x">
                            <label for="4x">4X</label>
                            <input type="checkbox" name="wargame" id="wargame">
                            <label for="wargame">Wargame</label>
                        </details>
                        <details>
                            <summary>Autres genres</summary>
                            <input type="checkbox" name="sport" id="sport">
                            <label for="sport">Sport</label>
                            <input type="checkbox" name="course" id="course">
                            <label for="course">Course</label>
                            <input type="checkbox" name="rythme" id="rythme">
                            <label for="rythme">Rythme</label>
                            <input type="checkbox" name="programming" id="programming">
                            <label for="programming">Jeux de programmation</label>
                        </details>
                    </div>
                    <div>
                        <input type="radio" name="mode" id="chill">
                        <label for="chill">Chill</label>
                        <input type="radio" name="mode" id="tryhard">
                        <label for="tryhard">Try Hard</label>
                        <input type="radio" name="mode" id="compet">
                        <label for="compet">Ranked only</label>
                        <input type="radio" name="mode" id="coach">
                        <label for="coach">Coach</label>
                        <input type="radio" name="mode" id="pro">
                        <label for="pro">Pro</label>
                    </div>
                </form>
            </div>
            
        </div>

    </main>
    <?php include '../src/view/footer.inc.php' ?>
  </body>
</html>
