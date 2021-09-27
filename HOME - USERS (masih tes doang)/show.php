<script>
    function showAll() {
        let berita = document.getElementById('berita');
        berita.innerHTML = '';
        <?php
            foreach($berita as $news) { ?>
            let container = '<div id=<?=$news['idBerita']?> class="container">';
            let judul = '<h3><?=$news['judul']?></h3>';
            let kategori = '<h4 style="display: inline-block; padding-right: 30px;">Kategori : <b><?=$news['kategori']?></b></h4>';
            let tanggal = '<h4 style="display: inline-block;">Tanggal : <b><?=$news['tanggal']?></b></h4></div>';

            let newBox = container+judul+kategori+tanggal;
            berita.innerHTML += newBox;
        <?php }?>
    }

    function showPolitik() {
        let berita = document.getElementById('berita');
        berita.innerHTML = '';
        <?php
            $kategori = "Politik";
            foreach($berita as $news) { 
                if($news['kategori'] == $kategori) {?>
                    let container = '<div id=<?=$news['idBerita']?> class="container">';
                    let judul = '<h3><?=$news['judul']?></h3>';
                    let kategori = '<h4 style="display: inline-block; padding-right: 30px;">Kategori : <b><?=$news['kategori']?></b></h4>';
                    let tanggal = '<h4 style="display: inline-block;">Tanggal : <b><?=$news['tanggal']?></b></h4></div>';

                    let newBox = container+judul+kategori+tanggal;
                    berita.innerHTML += newBox;
        <?php }}?>
    }

    function showFood() {
        let berita = document.getElementById('berita');
        berita.innerHTML = '';
        <?php
            $kategori = "Food";
            foreach($berita as $news) { 
                if($news['kategori'] == $kategori) {?>
                    let container = '<div id=<?=$news['idBerita']?> class="container">';
                    let judul = '<h3><?=$news['judul']?></h3>';
                    let kategori = '<h4 style="display: inline-block; padding-right: 30px;">Kategori : <b><?=$news['kategori']?></b></h4>';
                    let tanggal = '<h4 style="display: inline-block;">Tanggal : <b><?=$news['tanggal']?></b></h4></div>';

                    let newBox = container+judul+kategori+tanggal;
                    berita.innerHTML += newBox;
        <?php }}?>
    }

    function showEconomy() {
        let berita = document.getElementById('berita');
        berita.innerHTML = '';
        <?php
            $kategori = "Economy";
            foreach($berita as $news) { 
                if($news['kategori'] == $kategori) {?>
                    let container = '<div id=<?=$news['idBerita']?> class="container">';
                    let judul = '<h3><?=$news['judul']?></h3>';
                    let kategori = '<h4 style="display: inline-block; padding-right: 30px;">Kategori : <b><?=$news['kategori']?></b></h4>';
                    let tanggal = '<h4 style="display: inline-block;">Tanggal : <b><?=$news['tanggal']?></b></h4></div>';

                    let newBox = container+judul+kategori+tanggal;
                    berita.innerHTML += newBox;
        <?php }}?>
    }
</script>