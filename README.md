# Symfony homework

To run project start it in docker with command

```bash
scripts/start.sh
```

Then start docker's backend with command
```bash
scripts/backend.sh
```

To run application just type:
```bash
bin/console app:age:calculator [birthDate] --adult
```
* __birthDate__ should by typed in YYYY-mm-dd format (ex. 2001-04-15)
* if __--adult__ is set you will get check is person an adult or not yet (18 years old or more).

### Some description
__birthDate__ is set as optional instead of required to get ability to respond with nice formatted text instead of plain error. birthDate is checked with regex.

No routes have been set, __autowire__ and __autoconfigure__ was turned off, services was added manually.
