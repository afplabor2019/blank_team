package hangmangame;

import javax.swing.JDialog;
import javax.swing.JOptionPane;

public class LoginFrame extends javax.swing.JFrame {

    public LoginFrame() {
        initComponents();
        
    }

    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jPW_Field = new javax.swing.JPasswordField();
        jB_Enter = new javax.swing.JButton();
        jScrollPane1 = new javax.swing.JScrollPane();
        jTP_Username = new javax.swing.JTextPane();
        jTextField1 = new javax.swing.JTextField();
        jTB_Forgotpw = new javax.swing.JToggleButton();
        jTB_guest = new javax.swing.JToggleButton();
        jPasswordField = new javax.swing.JPasswordField();

        jPW_Field.setText("jPasswordField1");

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);

        jB_Enter.setText("Enter");
        jB_Enter.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                jB_EnterMouseClicked(evt);
            }
        });

        jScrollPane1.setViewportView(jTP_Username);

        jTextField1.setEditable(false);
        jTextField1.setFont(new java.awt.Font("Trebuchet MS", 1, 24)); // NOI18N
        jTextField1.setText("Login user");

        jTB_Forgotpw.setText("Forgot your password?");
        jTB_Forgotpw.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                jTB_ForgotpwMouseClicked(evt);
            }
        });

        jTB_guest.setText("Guest Mode");
        jTB_guest.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                jTB_guestMouseClicked(evt);
            }
        });

        jPasswordField.setText("jPasswordField1");
        jPasswordField.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                jPasswordFieldMouseClicked(evt);
            }
        });

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGap(379, 379, 379)
                .addComponent(jB_Enter, javax.swing.GroupLayout.PREFERRED_SIZE, 175, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                .addContainerGap(337, Short.MAX_VALUE)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING, false)
                    .addGroup(layout.createSequentialGroup()
                        .addComponent(jTB_Forgotpw)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                        .addComponent(jTB_guest))
                    .addComponent(jScrollPane1, javax.swing.GroupLayout.DEFAULT_SIZE, 267, Short.MAX_VALUE)
                    .addComponent(jTextField1, javax.swing.GroupLayout.DEFAULT_SIZE, 267, Short.MAX_VALUE)
                    .addComponent(jPasswordField))
                .addGap(356, 356, 356))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                .addGap(83, 83, 83)
                .addComponent(jTextField1, javax.swing.GroupLayout.PREFERRED_SIZE, 72, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(18, 18, 18)
                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 38, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(18, 18, 18)
                .addComponent(jPasswordField, javax.swing.GroupLayout.PREFERRED_SIZE, 38, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(38, 38, 38)
                .addComponent(jB_Enter, javax.swing.GroupLayout.PREFERRED_SIZE, 72, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 32, Short.MAX_VALUE)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jTB_Forgotpw)
                    .addComponent(jTB_guest))
                .addGap(108, 108, 108))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void jB_EnterMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_jB_EnterMouseClicked
        String username = jTP_Username.getText();
        String pw =jPasswordField.getText();
        HangmanGame.LoginUser(username, pw);
    }//GEN-LAST:event_jB_EnterMouseClicked

    private void jPasswordFieldMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_jPasswordFieldMouseClicked
        jPasswordField.setText("");
    }//GEN-LAST:event_jPasswordFieldMouseClicked

    private void jTB_guestMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_jTB_guestMouseClicked
        JOptionPane optionPane = new JOptionPane("If you want play as a guest, your game records wont be saved.", JOptionPane.INFORMATION_MESSAGE);    
        JDialog dialog = optionPane.createDialog("Guest Mode");
        dialog.setAlwaysOnTop(true);
        dialog.setVisible(true);
        HangmanGame.LoginGuestMode();
    }//GEN-LAST:event_jTB_guestMouseClicked

    private void jTB_ForgotpwMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_jTB_ForgotpwMouseClicked
        JOptionPane optionPane = new JOptionPane("Sorry. this part of the game does not available yet.", JOptionPane.ERROR_MESSAGE);    
        JDialog dialog = optionPane.createDialog("Error");
        dialog.setAlwaysOnTop(true);
        dialog.setVisible(true);
    }//GEN-LAST:event_jTB_ForgotpwMouseClicked

    public static void main(String args[]) {
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
            java.util.logging.Logger.getLogger(LoginFrame.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(LoginFrame.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(LoginFrame.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(LoginFrame.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new LoginFrame().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton jB_Enter;
    private javax.swing.JPasswordField jPW_Field;
    private javax.swing.JPasswordField jPasswordField;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JToggleButton jTB_Forgotpw;
    private javax.swing.JToggleButton jTB_guest;
    private javax.swing.JTextPane jTP_Username;
    private javax.swing.JTextField jTextField1;
    // End of variables declaration//GEN-END:variables
}
