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
Fiecare pagina html din cadrul aplicatiei este formata dintr-un container care va contine un header(contine un logo cu numele scolii, un meniu de navigare), un body(specific continutului fiecarei pagini) si un footer.

Meniul de navigare este compus din: 
* Home
* Inscrieri
* Cursuri
* Traineri
* Calendar
* Organizatori
* Editii

![alt text](https://github.com/GeorgianaCamelia/Summer-courses/blob/master/images/meniu.jpg?raw=true "Meniu")

* Pagina de Home contine datele de contact si un formular prin care se pot trimite mesaje organizatorilor.

![alt text](https://github.com/GeorgianaCamelia/Summer-courses/blob/master/images/Home.png?raw=true "Home Page")

* Pagina Inscrieri contine un formular(nume, prenume, e-mail, telefon, ocupatie, alegerea cursurilor la care se doreste participarea) prin care persoanele interesate se pot inscrie la cursurile dorite.

![alt text](https://github.com/GeorgianaCamelia/Summer-courses/blob/master/images/Formular.png?raw=true "Formular")

* Pagina Cursuri contine informatii despre fiecare curs 
* Pagina Traineri contine informatii despre trainerii fiecarui curs
* Pagina Calendar contine informatii despre desfasurarea fiecarui curs
* Pagina Organizatori contine informatii despre organizatorii scolii de vara 
* Pagia Editii contine informatii despre editiile anterioare

 ### Functionabilitatea site-ului
Pe langa stocarea informatiilor si aspectul estetic al site-ului acesta trebuie sa raspunda comenzilor date de catre utilizator si mai mult decat atat trebuie sa verifice daca datele care sunt trimise catre server sunt valide si nu afecteaza buna functionalitate.
    Scripturile folosite vor fi scrise in JavaScript.
* Validarea input-urilor-
 presupune folosirea unor comenzi decizionale pentru a verifica daca utilizatorul a introdus informatii relevante si "nedaunatoare" site-ului.
 (prin informatii daunatoare intelegem bucati de cod SQL sau HTML care daca sunt trimise catre server pot modifica estetic sau functional site-ul)
* Comunicarea dintre site si utilizator-
Utilizatorul poate sa trimita un email prin care poate pune intrebari cu privire la concurs. De asemenea el o sa primeasca un email prin care sa se confirme faptul ca a fost inregistrat pentru cursurile alese.