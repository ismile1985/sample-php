## To Build and Run the web application

- to build and run:
```bash
docker-compose up --build -d
```

- to stop and restart web application
```bash
docker-compose down && docker-compose up --build -d
```


## Steps to Run db.php
Ensure that db.php is run at least once to set up the database:

Open your browser and navigate to http://localhost:8080/db.php. This should create the users table and insert the sample data.
Verify that the setup messages indicate success.

## Re-run and Test
After running db.php, go to http://localhost:8080 again to see if the users are listed.


## Set Up Jenkins Docker Container
Pull the Jenkins Docker Image:

```bash
docker pull jenkins/jenkins:lts
```
Run Jenkins Container:

```bash
docker run -d -p 8081:8080 -p 50000:50000 --name jenkins -v jenkins_home:/var/jenkins_home jenkins/jenkins:lts```

This will start Jenkins on port 8081.
The -v jenkins_home:/var/jenkins_home option mounts the Jenkins home directory to persist data.
Access Jenkins:

- Open your browser and navigate to http://localhost:8081.
