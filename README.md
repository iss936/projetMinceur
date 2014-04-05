projetMinceur
============
1) télécharger git bash(c'est en faite un terminal pour git).
Tout le reste se fait avec git bash

Pre condition: avoir configurer son git:
- git config --list (voir si user.email et user.name sont renseigné sinon configurer comme ci-dessous)
-  git config --global user.email ""
- git config --global user.name ""

si ce n'est pas fait créer un répertoire sur c:\wamp\www (par exemple)
1) en ligne de commande ce mettre dans ce fichier et faire "git init" 
2) si ton git est bien configuré le reste sera simple

I] Update ou récupération de la dernière version 

Par précautions et pour éviter des conflits il faut toujours faire un "update"

1) Pour récupérer un projet sur git faire git clone https://github.com/iss936 (clé ssh de mon git)
Attention!!!!!!!!!! cette ce commande ce fait une seule fois afin de récupérer l'ensemble du projet
2) Une fois qu'on a récupérer le projet on fera simplement git pull

tu feras un git pull à chaque fois que tu te mettra à travailler
pour éviter les coonflits de version.   

II] Les commit

1) Toujours dans le même répertoire faire git add modif1.txt modif2.txt modif3.txt ...
 ou git add. dans le cas ou tu a modifier tout les fichiers!!!!
2) git commit -m "ce que j'ai fait.."
3) Si c'est mon premier commit faire git remote add origin https://github.com/iss936(correspond à l'adresse de mon repository)
4) Sinon git push -u origin master


