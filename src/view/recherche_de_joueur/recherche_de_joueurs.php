<!DOCTYPE html>
<html lang="fr">
<head>
    <?php include './view/head.inc.php' ?>
    <link rel="stylesheet" href="../dist/output.css">
    <title>Recherche de joueurs</title>
    <script defer src=""></script>
</head>
<body>
<?php include './view/header.inc.php' ?>
    <main>
        <div class="flex">
            <section class="w-1/2 relative">
                <a href="<?= APP_ROOT ?>/recherche-rapide">
                    <img src="/assets/Image/recherche rapide.png" alt="Recherche rapide" />
                    <div class="bg-[#F45A01]/95 absolute top-10 left-10 w-[26.5vw]  rounded-full">
                        <h1 class="text-[2.75em] font-['Changa'] font-bold text-[#f1f7f9] text-center">Recherche rapide</h1>
                    </div>
                    <div class="bg-[#F45A01]/95 absolute bottom-16 right-16 w-[23vw] h-24 rounded-[30px]">
                        <p class="font-['Open_Sans', sans serif] text-[#f1f7f9] text-[0.875em] font-semibold px-6 pt-3 text-pretty">Faire une recherche rapide pour trouver des coéquipiers sur votre jeu préféré, jamais aussi facile. Choisissez votre jeu, et en un instant, découvrez des joueurs à votre niveau.</p>
                    </div>
                </a>
            </section>
            <section class="w-1/2 relative">
                <a href="<?= APP_ROOT ?>/recherche-par-annonce">
                    <img src="/assets/Image/recherche par annonce.png" alt="Recherche par annonce" />
                    <div class="bg-[#F45A01]/95 absolute top-10 left-10 w-[34vw] rounded-full ">
                        <h1 class="text-[2.75em] font-['Changa'] font-bold text-[#f1f7f9] text-center ">Recherche par annonce</h1>
                    </div>
                    <div class="bg-[#F45A01]/95 absolute bottom-16 right-16 w-[23vw] h-[15vh] rounded-[30px] ">
                        <p class="font-['Open_Sans', sans serif] text-[#f1f7f9] text-[0.875em] font-semibold px-6 pt-3">Créer ou de rejoindre des groupes grâce à des annonces personnalisées. Vous cherchez des coéquipiers pour des missions spécifiques dans votre jeu ? Publiez une annonce détaillée et trouvez les joueurs parfaits pour votre équipe.</p>
                    </div>
                </a>
            </section>
        </div>
    </main>
    <?php include './view/footer.inc.php' ?>
</body>
</html>