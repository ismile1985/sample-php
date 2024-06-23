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


##Environment Setup

#### Prerequisites
- **Operating System**: Linux (Ubuntu recommended) or macOS ( I am using MacOS, so below step mostly for MacOS)

Step 1: Install Docker on Mac
  If you haven't installed Docker yet, follow these steps:

 Download Docker Desktop for Mac from the Docker website. 
 - Download and install Docker Desktop from the [Docker website](https://www.docker.com/products/docker-desktop).
    Install Docker Desktop by following the on-screen instructions.
   Start Docker Desktop and ensure it is running.

Step 2: Pull the Jenkins Docker Image

  1. Open a terminal.

  2. Pull the official Jenkins Docker image:

    ```bash
     docker pull jenkins/jenkins:lts
    ```

Step 3: Run Jenkins in a Docker Container
  1. Create a Docker volume to persist Jenkins data:

    ```bash
       docker volume create jenkins_home
      ```
  2. Run the Jenkins container:

         ```bash
            docker run -d -p 8081:8080 -p 50000:50000 --name jenkins -v jenkins_home:/var/jenkins_home jenkins/jenkins:lts
             ```

Step 4: Access Jenkins:

    1. Open your web browser and navigate to http://localhost:8081.

    2. Follow the instructions to unlock Jenkins. You will need the initial admin password, which you can get by running:

      ```bash
           docker exec jenkins cat /var/jenkins_home/secrets/initialAdminPassword
        ```

    3.  Complete the setup wizard by installing the recommended plugins and creating an admin user.


Jenkins Pipeline Configuration:

Prerequisites:

  - Jenkins should be running in a Docker container on your local machine.

Step-by-Step Guide:

  1. Create a New Jenkins Pipeline Job
        . Go to Jenkins Dashboard.
        . Click on "New Item".
        . Enter a name for the job and select "Pipeline".
        . Click "OK".
  2. Configure the Pipeline
        . In the "Pipeline" section, select "Pipeline script from SCM".
        . Set "SCM" to "Git".
        . Enter the repository URL.
        . Set the "Branch Specifier" to the desired branch (e.g., main).
        . Specify the path to your Jenkinsfile (e.g., Jenkinsfile).

  3.   Create a Jenkinsfile ( i have created jenkinfile and attached on my repository)

NOTE: PLEASE CHANGE YOUR REPOSITORY NAME FROM MY REPO TO YOUR GIT REPO NAME IN "jenkinfile" on line number#7

  4. Save and Run the Job

     . Click "Save" to save the pipeline job configuration.
     . Click "Build Now" to run the pipeline.



Security Measures:

 1.  Secure Jenkins:
    . Enable Security: Go to "Manage Jenkins" > "Configure Global Security".
    . User Authentication: Enable Jenkins’ own user database and matrix-based security.
    . Use HTTPS: Configure Jenkins to use HTTPS by following the Jenkins HTTPS setup guide.

2.  Secure Docker

   . Run Docker as Non-Root User: Add your user to the docker group.
   
        ```bash
           sudo usermod -aG docker $USER
        ```
  .  Use Docker Bench for Security: Run Docker Bench for Security to check for common best practices around deploying Docker containers.

       ```bash
           git clone https://github.com/docker/docker-bench-security.git
           cd docker-bench-security
           sudo ./docker-bench-security.sh
        ```

3. Environment Variable Management
       
   . Use .env Files: Store sensitive information like API keys and passwords in a .env file and use a library to load them
  
       ```bash
           # .env
           DATABASE_URL=your-database-url
           API_KEY=your-api-key
        ```
     . Secure .env Files: Ensure .env files are not committed to version control by adding them to .gitignore.

       ```bash
          echo ".env" >> .gitignore
        ```

Compliance Report

      . Regular Updates: All dependencies are regularly updated to the latest versions.
   
      . Code Reviews: All code changes are reviewed by at least one other team member.
   
      .  Security Scanning: Automated security scanning is integrated into the CI/CD pipeline using tools like Snyk, Dependabot, or Trivy.
      
      . Least Privilege: Access controls follow the principle of least privilege, ensuring that users only have the permissions they need to perform their roles.
      
      . Regular Audits: Security audits are conducted regularly to identify and mitigate potential vulnerabilities.

