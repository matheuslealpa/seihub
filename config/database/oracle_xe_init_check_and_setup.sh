#!/bin/bash

# Função para verificar o status do Oracle XE
check_oracle() {
  result=$(docker exec -i database bash -c "export ORACLE_HOME=/u01/app/oracle/product/11.2.0/xe; export PATH=\$PATH:\$ORACLE_HOME/bin; export ORACLE_SID=XE; /u01/app/oracle/product/11.2.0/xe/bin/sqlplus -s system/oracle" <<EOF
SET PAGESIZE 0 FEEDBACK OFF VERIFY OFF HEADING OFF ECHO OFF
SELECT status FROM v\$instance;
EXIT;
EOF
)

  # Depuração: Mostra o resultado e qualquer mensagem de erro
  echo "Resultado do comando SQL: '$result'"
  if [[ "$result" == "OPEN" ]]; then
    echo "Oracle XE está totalmente inicializado."
    return 0
  else
    echo "Oracle XE ainda não está inicializado."
    return 1
  fi
}

# Verifica o status do Oracle XE repetidamente até que esteja inicializado
until check_oracle; do
  echo "Aguardando a inicialização do Oracle XE..."
  sleep 10
done
