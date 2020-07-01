using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace SOAPnet
{
    public partial class unos : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {

        }

        protected void btnPoziv_Click(object sender, EventArgs e)
        {
            klijentskaApp.WebServisSoapClient klijent = new klijentskaApp.WebServisSoapClient("WebServisSoap");
            int broj = int.Parse(inputBroj.Text);
            int rezultat = klijent.GetSquare(broj);
            LblRezultat.Text = "rezultat je: " + rezultat;
        }

        protected void inputBroj_TextChanged(object sender, EventArgs e)
        {

        }
    }
}