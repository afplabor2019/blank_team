package hangmangame;
import java.awt.Dimension;
import java.awt.Graphics;
import java.awt.Graphics2D;
import java.awt.Image;
import java.awt.RenderingHints;
import java.awt.Toolkit;
import java.awt.image.BufferedImage;
import java.awt.image.ImageObserver;
import java.io.File;
import java.io.IOException;
import javax.imageio.ImageIO;
import javax.swing.ImageIcon;
import javax.swing.JDialog;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.SwingUtilities;

public class HangmanGame
{
    public static LoginFrame lF = new LoginFrame();
    public static MainFrame mF = new MainFrame();
    public static GameFrame gF = new GameFrame();
    public static UserFrame uF = new UserFrame();
    
    public static Image img = Toolkit.getDefaultToolkit().getImage("alaphatter.png");
    public static boolean guestmode;
    
    public static void main(String[] args) 
    {

        lF.setResizable(false);
        mF.setResizable(false);
        gF.setResizable(false);
        uF.setResizable(false);
        
        lF.setLocationRelativeTo(null);
        mF.setLocationRelativeTo(null);
        gF.setLocationRelativeTo(null);
        uF.setLocationRelativeTo(null);

//        mF.setContentPane(new JLabel(new ImageIcon(img)));
//        mF.setLayout(null);
//        mF.setLocationRelativeTo(null);
       
        lF.setVisible(true);  
    }    
    
        public static Image getScaledImage(Image srcImg, int w, int h)
        {
            BufferedImage resizedImg = new BufferedImage(w, h, BufferedImage.TYPE_INT_ARGB);
            Graphics2D g2 = resizedImg.createGraphics();

            g2.setRenderingHint(RenderingHints.KEY_INTERPOLATION, RenderingHints.VALUE_INTERPOLATION_BILINEAR);
            g2.drawImage(srcImg, 0, 0, w, h, null);
            g2.dispose();

            return resizedImg;
        }
    
    public static void LoginUser(String name, String password)
    {
        if(name.equals("admin") && password.equals("admin"))
        {
            guestmode = false;
            lF.setVisible(false);
            mF.setVisible(true); 
        }  
        else
        {
            JOptionPane optionPane = new JOptionPane("You given an incorrect username or password!", JOptionPane.ERROR_MESSAGE);    
            JDialog dialog = optionPane.createDialog("You are a failure. Try again.");
            dialog.setAlwaysOnTop(true);
            dialog.setVisible(true);
        }
    }
    
    public static void LoginGuestMode()
    {
            guestmode = true;
            lF.setVisible(false);
            mF.setVisible(true); 
    }
    
    public static void ChooseGameMode()
    {
        mF.setVisible(false);
        gF.setVisible(true);
    }
    
    public static void BackToTheMain()
    {
        gF.setVisible(false);
        mF.setVisible(true);
    }
    
    public static void GetUserData()
    {
        uF.isAlwaysOnTop();
        uF.setVisible(true);
    }
    
    public static void CloseUserData()
    {
        uF.setVisible(false);
    }
  
}
