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
import java.text.CharacterIterator;
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
    
    
    public static Image hatter = Toolkit.getDefaultToolkit().getImage("alaphatter.png");
    public static ImageIcon hattericon = new ImageIcon(hatter);
    public static Image image= hattericon.getImage().getScaledInstance(1070, 670, Image.SCALE_SMOOTH);
    
    public static Image i1 = Toolkit.getDefaultToolkit().getImage("1.png");
    public static Image i2 = Toolkit.getDefaultToolkit().getImage("2.png");
    public static Image i3 = Toolkit.getDefaultToolkit().getImage("3.png");
    public static Image i4 = Toolkit.getDefaultToolkit().getImage("4.png");
    public static Image i5 = Toolkit.getDefaultToolkit().getImage("5.png");
    public static Image i6 = Toolkit.getDefaultToolkit().getImage("6.png");
    public static Image i7 = Toolkit.getDefaultToolkit().getImage("7.png");
    public static Image i8 = Toolkit.getDefaultToolkit().getImage("8.png");
    public static Image i9= Toolkit.getDefaultToolkit().getImage("9.png");
    public static Image i10 = Toolkit.getDefaultToolkit().getImage("10.png");
    public static Image i11 = Toolkit.getDefaultToolkit().getImage("11.png");
    public static Image i12 = Toolkit.getDefaultToolkit().getImage("12.png");
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
