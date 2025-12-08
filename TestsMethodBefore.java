import org.junit.*;
import static org.junit.Assert.assertEquals;

public class TestsMethodBefore {
    
    private int a;

    @Before
    public void initialisation() {
    this.a = 4;
    }
    
    @Test
    public void test_valeur_a() {
    assertEquals(a, 2 + 2);
    }

    @Test
    public void test_valeur_a_plus_un() {
    this.a += 1;
    assertEquals(a, 5);
    }

    @Test
    public void test_valeur_a_again() {
    assertEquals(a*a, 0x10);
    }
}