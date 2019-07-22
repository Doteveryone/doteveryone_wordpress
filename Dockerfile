# Use an official Centos image as a parent image
FROM centos:centos7

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Copy the current directory contents into the container at /app
COPY . /var/www/html

# Install any needed packages specified in requirements.txt
RUN yum install -y epel-release http://rpms.remirepo.net/enterprise/remi-release-7.rpm  yum-utils && \
    yum-config-manager --enable remi-php72 && \
    yum -y install httpd php php-devel php-fpm php-gd php-imap php-ldap php-mbstring php-mcrypt php-mysql php-pdo php-pear php-pecl-apc php-xml php-xmlrpc mysql  && \
    chmod -R g+w /var/www/html && \
    yum clean all && \
    rm -rf /var/cache/yum && \
    rm -f /etc/httpd/conf.d/{userdir.conf,welcome.conf} && \
    sed -i 's/Listen 80/Listen 8080/' /etc/httpd/conf/httpd.conf

# Make port 80 available to the world outside this container
EXPOSE 8080

# Define environment variable
ENV DB_IP host.docker.internal
ENV DB_PASS password
ENV DB_USER root

# Run apache when the container launches
CMD ["/usr/sbin/httpd", "-DFOREGROUND"]