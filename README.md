# Summer_school

## Cerinta proiectului:
*Sa se implementeze un site care gestioneaza inscrierile la o scoala de vara. Aplicatia trebuie sa ofere urmatoarele facilitati:*
* formular de inscriere la cursul/cursurile selectat/e
* trimiterea unui e-mail de notificare dupa inscriere
* crearea unui administrator care sa gestioneze inscrierile din cadrul cursurilor

Avand in vedere cerinta prezentata putem sa impartim proiectul in **trei main task-uri**:
* Crearea unei baze de date specifica cerintei
* Crearea site-ului 
* Functionabilitatea site-ului


### Conectarea la baza de date si crearea legaturii acesteia cu formularul de inscriere 
![alt text](https://github.com/GeorgianaCamelia/Summer_school/blob/master/images/schita_bd.png?raw=true "Schita bazei de date")

Baza de date va contine urmatoarele tabele:
1. Persoana format din atributele: 
* ID_P - cheie primara
* Nume
* Prenume
* Email
* Telefon
* Ocupatie
2. Curs format din atributele:
* ID_C - cheie primara
* Nume_curs
* Data_inceperii
3. Legatura ce va contine cheia primara a tabelelor Persoana si Curs
* ID_P
* ID_C
4. Admin ce va retine 
* Parola criptata cu MD5 a adimin-ului
* numele "admin"

Va fi posibila afisarea participantilor in functie de cursurile la care s-au inscris.

In crearea BD si conexiunii se va folosi MySQL si PHP. 



### Crearea site-ului
Aplicatia este formata dintr-o pagina HTML care va contine elementele head(in interiorul lui vom gasi o serie de elemente prin care ii spunem browser-ului: titlul paginii, unde sunt situate fisierele CSS si Javascript si cum ar trebui citit documentul) si elementul body(vom pune tot continutul paginii). Body-ul este format dintr-un header(contine un logo, un meniu de navigare), sectiune pentru fiecare optiune din meniu si un footer.

Meniul de navigare este compus din: 
* Home
* Inscrieri
* Cursuri
* Traineri
* Calendar
* Organizatori
* Editii

![alt text](https://github.com/GeorgianaCamelia/Summer_school/blob/master/images/meniu.jpg?raw=true "Meniu")

* Sectiunea de Home contine informatii despre cursuri si un icon bar care prin apasare te redirectioneaza la sectiunea de Inscrieri.

![alt text](https://github.com/GeorgianaCamelia/Summer_school/blob/master/images/Home.png?raw=true "Home Page")

* Sectiunea Inscrieri contine un formular(nume, prenume, e-mail, telefon, ocupatie, alegerea cursurilor la care se doreste participarea) prin care persoanele interesate se pot inscrie la cursurile dorite. De asemenea, sectiunea contine un captcha(o metodă automată de a determina dacă utilizatorul unui software este o persoană sau un program de calculator)

![alt text](https://github.com/GeorgianaCamelia/Summer_school/blob/master/images/Formular.png?raw=true "Formular")

* Sectiunea Cursuri contine informatii despre fiecare curs 
* Sectiunea Traineri contine informatii despre trainerii fiecarui curs
* Sectiunea Calendar contine informatii despre desfasurarea fiecarui curs
* Sectiunea Organizatori contine informatii despre organizatorii scolii de vara 
* Sectiunea Editii contine informatii despre editiile anterioare
* Sectiunea Contact contine informatii despre locul de desfasurare al cursurilor

Pagina va fi stilizata cu ajutorul CSS-ului

 ### Functionabilitatea site-ului
Pe langa stocarea informatiilor si aspectul estetic al site-ului acesta trebuie sa raspunda comenzilor date de catre utilizator si mai mult decat atat trebuie sa verifice daca datele care sunt trimise catre server sunt valide si nu afecteaza buna functionalitate.
    Scripturile folosite vor fi scrise in JavaScript.
* Validarea input-urilor-
 presupune folosirea unor comenzi decizionale pentru a verifica daca utilizatorul a introdus informatii relevante si "nedaunatoare" site-ului.
 (prin informatii daunatoare intelegem bucati de cod SQL sau HTML care daca sunt trimise catre server pot modifica estetic sau functional site-ul)
* Comunicarea dintre site si utilizator-
Utilizatorul poate sa trimita un email prin care poate pune intrebari cu privire la concurs. De asemenea el o sa primeasca un email prin care sa se confirme faptul ca a fost inregistrat pentru cursurile alese.