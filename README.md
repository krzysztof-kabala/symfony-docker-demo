krzysztof.kabala
========================
Symfony docker DEMO app

Requirements
---
 * configure Your local [projects enrironment](https://bitbucket.org/as-docker/projects-environment)
 * make sure You have [YAKE](https://yake.amsdard.io/) installed


Run project
---
```
yake configure
yake up
yake install
```
* run `yake encore dev --watch` (or `npm run watch`) in background to work with assets
* make sure `krzysztof.kabala.test` domain is routed to Your localhost

add some data
```
yake console app:add-data ...
```

Additional info
---
* do not use `require-dev` in composer.json (keep common vendors)


Deploy (dev / rancher)
---
```
yake deploy webapp
```
* import `./deploy/rancher/docker-compose.yml` into Rancher + complete ENVs
* make sure `mysql` works on specific host (Scheduling)
* make sure `webapp` has *Health Check* enabled


Deploy (prod)
---
```
yake deploy webapp
```
* import `./deploy/prod/docker-compose.yml` into server + copy ENV files from `docker` directory
* `docker-compose pull --parallel --quiet`
* `docker-compose up -d --force-recreate`

