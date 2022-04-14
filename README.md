<p align="center">
    <h1>Loyiha qanday ishga tushuriladi?</h1>
</p>

<ol>
    <li>loyiha kod fayllari php serverining papkasiga clon qilib olinadi</li>
    <li>Terminal(command line)da loyiha joylashgan papkaga otiladi va <br><i>composer update</i><br> buyrug'i yoziladi. (composer buyruqlarini yurgazish uchun sizda <a href="https://getcomposer.org/download/">Composer</a> o'rnatilgan bo'lishi lozim!)</li>
    <li>MySQL serverida ixtiyoriy nom bilan(masalan: "family_account") ma'lumotlar bazasi yaratiladi</li>
    <li>/config/db.php faylini oching va "dbname" qiymatini "family_account" dan ozingiz yaratgan ma'lumotlar bazasi nomiga ozgartiring.</li>
    <li>Terminalda loyiha joylashgan papkaga o'tib, <br><i>yii migrate</i><br>
    buyrug'ini yozing va ENTER ni bosing. Qo'shimcha sorovlar uchun terminalga "yes" ni yozib ENTER ni bosing</li>
    <li>Loyiha ishlashga tayyor!</li>
    <li>Admin login:    admin <br> Admin parol:     admin</li>
    <li>Fake ma'lumotlar qo'shish uchun browser ga <br><i>your_domain_name/site/fake-data <br> manzilini kiriting</li>
</ol>
