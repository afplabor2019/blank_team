package hangmangame;

import java.awt.Image;
import java.awt.image.BufferedImage;
import java.io.File;
import java.io.IOException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.imageio.ImageIO;
import javax.swing.ImageIcon;
import javax.swing.JDialog;
import javax.swing.JOptionPane;

public class MainFrame extends javax.swing.JFrame {

    public MainFrame() {
        initComponents();
        
        BufferedImage u_img = null;
        try {
            u_img = ImageIO.read(new File("usericon.png"));
        } catch (IOException e) {
        }
        jB_User.setIcon(new ImageIcon(u_img));
        
        BufferedImage s_img = null;
        try {
            s_img = ImageIO.read(new File("settingsicon.png"));
        } catch (IOException e) {
        }
        jB_Settings.setIcon(new ImageIcon(s_img));
    }

    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jP_main = new javax.swing.JPanel();
        jB_WorldCup = new javax.swing.JButton();
        jB_Practice = new javax.swing.JButton();
        jB_Competitive = new javax.swing.JButton();
        jB_Campaign = new javax.swing.JButton();
        jB_Infinite = new javax.swing.JButton();
        jB_Statistics = new javax.swing.JButton();
        jB_Sponsors = new javax.swing.JButton();
        jB_User = new javax.swing.JButton();
        jB_Settings = new javax.swing.JButton();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        setResizable(false);
        setSize(new java.awt.Dimension(960, 540));

        jP_main.addFocusListener(new java.awt.event.FocusAdapter() {
            public void focusGained(java.awt.event.FocusEvent evt) {
                jP_mainFocusGained(evt);
            }
        });

        jB_WorldCup.setBackground(new java.awt.Color(57, 165, 255));
        jB_WorldCup.setForeground(new java.awt.Color(255, 255, 255));
        jB_WorldCup.setActionCommand("jB_WorldCup");
        jB_WorldCup.setLabel("WorldCup");
        jB_WorldCup.setName("jB_WorldCup"); // NOI18N
        jB_WorldCup.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                jB_WorldCupMouseClicked(evt);
            }
        });

        jB_Practice.setBackground(new java.awt.Color(57, 165, 255));
        jB_Practice.setForeground(new java.awt.Color(255, 255, 255));
        jB_Practice.setLabel("Practice");
        jB_Practice.setPreferredSize(new java.awt.Dimension(73, 180));
        jB_Practice.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                jB_PracticeMouseClicked(evt);
            }
        });
        jB_Practice.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jB_PracticeActionPerformed(evt);
            }
        });

        jB_Competitive.setBackground(new java.awt.Color(57, 165, 255));
        jB_Competitive.setForeground(new java.awt.Color(255, 255, 255));
        jB_Competitive.setLabel("Competitive");
        jB_Competitive.setName(""); // NOI18N
        jB_Competitive.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                jB_CompetitiveMouseClicked(evt);
            }
        });

        jB_Campaign.setBackground(new java.awt.Color(57, 165, 255));
        jB_Campaign.setForeground(new java.awt.Color(255, 255, 255));
        jB_Campaign.setLabel("Campaign");
        jB_Campaign.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                jB_CampaignMouseClicked(evt);
            }
        });

        jB_Infinite.setBackground(new java.awt.Color(57, 165, 255));
        jB_Infinite.setForeground(new java.awt.Color(255, 255, 255));
        jB_Infinite.setLabel("Infinite");
        jB_Infinite.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                jB_InfiniteMouseClicked(evt);
            }
        });

        jB_Statistics.setBackground(new java.awt.Color(57, 165, 255));
        jB_Statistics.setForeground(new java.awt.Color(255, 255, 255));
        jB_Statistics.setLabel("Statistics");
        jB_Statistics.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                jB_StatisticsMouseClicked(evt);
            }
        });

        jB_Sponsors.setBackground(new java.awt.Color(57, 165, 255));
        jB_Sponsors.setForeground(new java.awt.Color(255, 255, 255));
        jB_Sponsors.setLabel("Sponsors");
        jB_Sponsors.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                jB_SponsorsMouseClicked(evt);
            }
        });

        jB_User.setBackground(new java.awt.Color(255, 255, 255));
        jB_User.setBorder(javax.swing.BorderFactory.createEmptyBorder(1, 1, 1, 1));
        jB_User.setBorderPainted(false);
        jB_User.setIconTextGap(0);
        jB_User.setMargin(new java.awt.Insets(0, 0, 0, 0));
        jB_User.setOpaque(false);
        jB_User.setPreferredSize(new java.awt.Dimension(60, 60));
        jB_User.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                jB_UserMouseClicked(evt);
            }
        });
        jB_User.addComponentListener(new java.awt.event.ComponentAdapter() {
            public void componentShown(java.awt.event.ComponentEvent evt) {
                jB_UserComponentShown(evt);
            }
        });

        jB_Settings.setBackground(new java.awt.Color(255, 255, 255));
        jB_Settings.setBorder(javax.swing.BorderFactory.createEmptyBorder(1, 1, 1, 1));
        jB_Settings.setBorderPainted(false);
        jB_Settings.setMargin(new java.awt.Insets(0, 0, 0, 0));
        jB_Settings.setOpaque(false);
        jB_Settings.setPreferredSize(new java.awt.Dimension(60, 60));
        jB_Settings.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                jB_SettingsMouseClicked(evt);
            }
        });

        javax.swing.GroupLayout jP_mainLayout = new javax.swing.GroupLayout(jP_main);
        jP_main.setLayout(jP_mainLayout);
        jP_mainLayout.setHorizontalGroup(
            jP_mainLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jP_mainLayout.createSequentialGroup()
                .addContainerGap(394, Short.MAX_VALUE)
                .addGroup(jP_mainLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jP_mainLayout.createSequentialGroup()
                        .addComponent(jB_User, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(18, 18, 18)
                        .addComponent(jB_Settings, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(32, 32, 32))
                    .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jP_mainLayout.createSequentialGroup()
                        .addGroup(jP_mainLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING, false)
                            .addComponent(jB_Practice, javax.swing.GroupLayout.PREFERRED_SIZE, 188, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jB_WorldCup, javax.swing.GroupLayout.PREFERRED_SIZE, 188, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jB_Competitive, javax.swing.GroupLayout.PREFERRED_SIZE, 188, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jB_Campaign, javax.swing.GroupLayout.PREFERRED_SIZE, 188, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jB_Infinite, javax.swing.GroupLayout.PREFERRED_SIZE, 188, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addGroup(jP_mainLayout.createSequentialGroup()
                                .addComponent(jB_Statistics)
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                                .addComponent(jB_Sponsors)))
                        .addGap(378, 378, 378))))
        );
        jP_mainLayout.setVerticalGroup(
            jP_mainLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jP_mainLayout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jP_mainLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jB_Settings, javax.swing.GroupLayout.PREFERRED_SIZE, 67, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jB_User, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(jB_WorldCup, javax.swing.GroupLayout.PREFERRED_SIZE, 60, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jB_Practice, javax.swing.GroupLayout.PREFERRED_SIZE, 60, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(jB_Competitive, javax.swing.GroupLayout.PREFERRED_SIZE, 60, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(9, 9, 9)
                .addComponent(jB_Campaign, javax.swing.GroupLayout.PREFERRED_SIZE, 60, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(jB_Infinite, javax.swing.GroupLayout.PREFERRED_SIZE, 60, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addGroup(jP_mainLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jB_Sponsors, javax.swing.GroupLayout.PREFERRED_SIZE, 60, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jB_Statistics, javax.swing.GroupLayout.PREFERRED_SIZE, 60, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(0, 43, Short.MAX_VALUE))
        );

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jP_main, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jP_main, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void jB_PracticeMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_jB_PracticeMouseClicked
        HangmanGame.ChooseGameMode();
    }//GEN-LAST:event_jB_PracticeMouseClicked

    private void jB_WorldCupMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_jB_WorldCupMouseClicked
        JOptionPane optionPane = new JOptionPane("Sorry. this part of the game does not available yet.", JOptionPane.ERROR_MESSAGE);    
        JDialog dialog = optionPane.createDialog("Error");
        dialog.setAlwaysOnTop(true);
        dialog.setVisible(true);
    }//GEN-LAST:event_jB_WorldCupMouseClicked

    private void jB_CompetitiveMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_jB_CompetitiveMouseClicked
        JOptionPane optionPane = new JOptionPane("Sorry. this part of the game does not available yet.", JOptionPane.ERROR_MESSAGE);    
        JDialog dialog = optionPane.createDialog("Error");
        dialog.setAlwaysOnTop(true);
        dialog.setVisible(true);
    }//GEN-LAST:event_jB_CompetitiveMouseClicked

    private void jB_CampaignMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_jB_CampaignMouseClicked
        JOptionPane optionPane = new JOptionPane("Sorry. this part of the game does not available yet.", JOptionPane.ERROR_MESSAGE);    
        JDialog dialog = optionPane.createDialog("Error");
        dialog.setAlwaysOnTop(true);
        dialog.setVisible(true);
    }//GEN-LAST:event_jB_CampaignMouseClicked

    private void jB_InfiniteMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_jB_InfiniteMouseClicked
        JOptionPane optionPane = new JOptionPane("Sorry. this part of the game does not available yet.", JOptionPane.ERROR_MESSAGE);    
        JDialog dialog = optionPane.createDialog("Error");
        dialog.setAlwaysOnTop(true);
        dialog.setVisible(true);
    }//GEN-LAST:event_jB_InfiniteMouseClicked

    private void jB_StatisticsMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_jB_StatisticsMouseClicked
        JOptionPane optionPane = new JOptionPane("Sorry. this part of the game does not available yet.", JOptionPane.ERROR_MESSAGE);    
        JDialog dialog = optionPane.createDialog("Error");
        dialog.setAlwaysOnTop(true);
        dialog.setVisible(true);
    }//GEN-LAST:event_jB_StatisticsMouseClicked

    private void jB_SponsorsMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_jB_SponsorsMouseClicked
        JOptionPane optionPane = new JOptionPane("Sorry. this part of the game does not available yet.", JOptionPane.ERROR_MESSAGE);    
        JDialog dialog = optionPane.createDialog("Error");
        dialog.setAlwaysOnTop(true);
        dialog.setVisible(true);
    }//GEN-LAST:event_jB_SponsorsMouseClicked

    private void jB_SettingsMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_jB_SettingsMouseClicked
        JOptionPane optionPane = new JOptionPane("Sorry. this part of the game does not available yet.", JOptionPane.ERROR_MESSAGE);    
        JDialog dialog = optionPane.createDialog("Error");
        dialog.setAlwaysOnTop(true);
        dialog.setVisible(true);
    }//GEN-LAST:event_jB_SettingsMouseClicked

    private void jB_UserMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_jB_UserMouseClicked
        HangmanGame.GetUserData();
    }//GEN-LAST:event_jB_UserMouseClicked

    private void jB_PracticeActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jB_PracticeActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_jB_PracticeActionPerformed

    private void jP_mainFocusGained(java.awt.event.FocusEvent evt) {//GEN-FIRST:event_jP_mainFocusGained

    }//GEN-LAST:event_jP_mainFocusGained

    private void jB_UserComponentShown(java.awt.event.ComponentEvent evt) {//GEN-FIRST:event_jB_UserComponentShown

    }//GEN-LAST:event_jB_UserComponentShown

    public static void main(String args[]) {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(MainFrame.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(MainFrame.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(MainFrame.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(MainFrame.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new MainFrame().setVisible(true);
            }
        });
    }

    
    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton jB_Campaign;
    private javax.swing.JButton jB_Competitive;
    private javax.swing.JButton jB_Infinite;
    private javax.swing.JButton jB_Practice;
    private javax.swing.JButton jB_Settings;
    private javax.swing.JButton jB_Sponsors;
    private javax.swing.JButton jB_Statistics;
    private javax.swing.JButton jB_User;
    private javax.swing.JButton jB_WorldCup;
    private javax.swing.JPanel jP_main;
    // End of variables declaration//GEN-END:variables
}
