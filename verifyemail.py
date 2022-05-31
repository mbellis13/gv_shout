import smtplib
import ssl
import sys
from email.mime.text import MIMEText


if len(sys.argv) < 3:
    sys.exit()


webmaster='gv.shout.webmaster@gmail.com'
access='gvshoutwebmaster'

smtp_server_domain_name='smtp.gmail.com'
port=465
server = smtplib.SMTP_SSL(smtp_server_domain_name, port, context=ssl.create_default_context())

server.login(webmaster,access)

msg = MIMEText("click the link to verify your email<a href='10.30.40.181/gv_shout/verify.php?email="+sys.argv[1]+"&ver="+sys.argv[2]+"'>click here to verify</a>", 'html')

msg['Subject']='Verify GV_SHOUT!! email address'

server.sendmail(webmaster,sys.argv[1], msg.as_string())

server.quit()


