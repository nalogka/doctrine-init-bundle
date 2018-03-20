Execution of initial SQLs after connection is established
=========================================================

Symfony bundle for executing some initial SQLs right after
database connection has been established.

## Installing

```bash
composer require nalogka/doctrine-init-bundle
```

After that you can set up initial sql commands in project configuration:

```yaml
nalogka_connection_init:
    initial_sqls:
        - "SET SESSION wait_timeout = 3600" # setting up mysql inactivity timeout (sec)
```

Defined SQLs will be executed right after the connection has been established.