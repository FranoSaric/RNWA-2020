<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="unos.aspx.cs" Inherits="SOAPnet.unos" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
        <div>
            Primjer web servisa</div>
        <asp:TextBox ID="inputBroj" runat="server" Height="51px" Width="364px" OnTextChanged="inputBroj_TextChanged"></asp:TextBox>
        <asp:Button ID="btnPoziv" runat="server" Height="70px" Text="Potrazi" Width="207px" OnClick="btnPoziv_Click" />
        <br />
        <br />
        <asp:Label ID="LblRezultat" runat="server" Text=""></asp:Label>
    </form>
</body>
</html>
