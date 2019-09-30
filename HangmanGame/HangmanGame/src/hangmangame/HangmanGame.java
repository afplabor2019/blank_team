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
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.SwingUtilities;

public class HangmanGame
{
    public static Image img = Toolkit.getDefaultToolkit().getImage("alaphatter.png");
    
    public static void main(String[] args) 
    {
        LoginFrame lF = new LoginFrame();
        MainFrame mF = new MainFrame();
        GameFrame gF = new GameFrame();
        
        lF.setResizable(false);
        mF.setResizable(false);
        gF.setResizable(false);
        
        lF.setLocationRelativeTo(null);
        mF.setLocationRelativeTo(null);
        gF.setLocationRelativeTo(null);

        mF.setContentPane(new JLabel(new ImageIcon(img)));
        mF.setLayout(null);
        mF.setLocationRelativeTo(null);
        
        mF.setVisible(true);        
    }    
    
  
}
