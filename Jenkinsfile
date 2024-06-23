pipeline {
    agent any

    stages {
        stage('Clone Repository') {
            steps {
                git 'https://github.com/yourusername/sample-php-app.git'
            }
        }
        stage('Build Docker Image') {
            steps {
                script {
                    docker.build('sample-php-app')
                }
            }
        }
        stage('Run Application') {
            steps {
                script {
                    dockerCompose.up('--build -d')
                }
            }
        }
        stage('Run Tests') {
            steps {
                // Add steps to run tests if you have any
                echo 'Running tests...'
            }
        }
        stage('Deploy') {
            steps {
                echo 'Deploying application...'
                // Deployment steps if different from docker-compose up
            }
        }
    }

    post {
        always {
            script {
                dockerCompose.down()
            }
        }
    }
}

def dockerCompose = new com.cloudbees.dockercompose.DockerCompose(this, '.')
