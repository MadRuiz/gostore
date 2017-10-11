<%-- 
    Document   : index
    Created on : 04-26-2016, 01:21:38 PM
    Author     : Enrique
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <jsp:include page="WEB-INF/estructura/head.jsp">
        <jsp:param name="title" value="Inicio de Sesión" />
    </jsp:include>
    <body style="background-color: #932426;">
        <div class="container">
            <h1 class="text-center login-title"></h1>
            <div class="account-wall">
                <img class="profile-img" src="img/LOGO UGB.png" alt="">
                <form action="procesos/validarUsuario.jsp" method="post" class="form-signin">
                    <input name="user" id="user" type="text" class="form-control" placeholder="Usuario" required autofocus><br>
                    <input name="pass" id="pass" type="password" class="form-control" placeholder="Contraseña" required><br>
                    <button class="btn btn-lg btn-danger btn-block" type="submit">Ingresar</button>
                    <a href="#" class="pull-right need-help">¿Necesitas ayuda? </a><span class="clearfix"></span>
                </form>
            </div>
        </div>
    </body>
</html>
