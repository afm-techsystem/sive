docker exec -it database mysql -u root -pdino -e "$(cat ./sql/todoelsql.sql)"
