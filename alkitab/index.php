<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>
<style>
    body{
        margin:0;
        padding:0;
        font-size:13px;
        background-color:#CCC;
    }
    .container{
        position:fixed;
        top:10px;
        left:10px;
        right:10px;
        bottom:10px;
        z-index:1;
        overflow:auto;
    }
    .content{
        display:block;
        padding:10px;
        border:1px solid #DDD;
        background-color:#FFF;
        box-shadow:0 0 10px rgba(0,0,0,0.4);
        border-radius:3px;
        margin:0 0 10px 0;
    }
    .content:last-child{
        margin:0;
    }
</style>
<body>

    <div id="container" class="container">

    </div>

</body>
<script src="jquery.min.js"></script>
<script>
    $(function(){
        let url = 'http://192.168.0.100/alkitab.api/1/1';
        let container = document.getElementById('container');
        $.ajax({
            type:"GET",
            url:url
        }).fail(function(e1,e2,e3){
            console.log( `Error On Request: ${e3}`);
        }).done(function(d){
            let j = JSON.parse( d );
            j.forEach((k)=>{
                container.append( addElement( k.BOOKID, k.CHAPTERNO, k.VERSENO, k.VERSETEXT) );
            })
        })
    })
    let booktx = [
    'Kejadian',
    'Keluaran',
    'Imamat',
    'Bilangan',
    'Ulangan',
    'Yosua',
    'Hakim-hakim',
    'Rut',
    '1 Samuel',
    '2 Samuel',
    '1 Raja-raja',
    '2 Raja-raja',
    '1 Tawarikh',
    '2 Tawarikh',
    'Ezra',
    'Nehemia',
    'Ester',
    'Ayub',
    'Mazmur',
    'Amsal',
    'Pengkhotbah',
    'Kidung Agung',
    'Yesaya',
    'Yeremia',
    'Ratapan',
    'Yehezkiel',
    'Daniel',
    'Hosea',
    'Yoel',
    'Amos',
    'Obaja',
    'Yunus',
    'Mikha',
    'Nahum',
    'Habakuk',
    'Zefanya',
    'Hagai',
    'Zakharia',
    'Maleakhi ',
    'Matius',
    'Markus',
    'Lukas',
    'Yohanes',
    'Kisah Para Rasul',
    'Roma',
    '1 Korintus',
    '2 Korintus',
    'Galatia',
    'Efesus',
    'Filipi',
    'Kolose',
    '1 Tesalonika',
    '2 Tesalonika',
    '1 Timotius',
    '2 Timotius',
    'Titus',
    'Filemon',
    'Ibrani',
    'Yakobus',
    '1 Petrus',
    '2 Petrus',
    '1 Yohanes',
    '2 Yohanes',
    '3 Yohanes',
    'Yudas',
    'Wahyu '
];
    function addElement( bookid, chapterno, verseno, content ){
        let out_div = document.createElement('div');
        out_div.classList.add('content');
        
        let div_bookid = document.createElement('div');
        div_bookid.classList.add('title');
        div_bookid.textContent = booktx[bookid];

        let div_chapter = document.createElement('div');
        div_chapter.classList.add('chapter');
        div_chapter.textContent = `Pasal: ${chapterno}`;

        let div_verse = document.createElement('div');
        div_verse.classList.add('verse');
        div_verse.textContent = `Ayat: ${verseno}`;

        let div_content = document.createElement('div');
        div_content.classList.add('versetext');
        div_content.textContent = content;

        out_div.append( div_bookid );
        out_div.append( div_chapter );
        out_div.append( div_verse );
        out_div.append( div_content );
        
        return out_div;
    }

</script>
</html>