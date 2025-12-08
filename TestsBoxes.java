import org.junit.*;
import static org.junit.Assert.assertEquals;

public class TestsBoxes {
    @Test
    public void testBoxCreate() {
        Box b = new Box();
    }


    @Test
    public void testBoxAddThing() {
        Box b = new Box();
        Thing t1 = new Thing("truc1");
        Thing t2 = new Thing("truc2");
        b.add(t1);
        b.add(t2);

        assertEquals(2, b.contents.size());
        assertEquals("truc1", b.contents.get(0).name);
        assertEquals("truc2", b.contents.get(1).name);
    }

    @Test
    public void testBoxContains() {
        Box b = new Box();
        Thing t1 = new Thing("truc1");
        Thing t2 = new Thing("truc2");
        Thing t3 = new Thing("truc3");
        b.add(t1);
        b.add(t2);
        b.add(t3);

        assertTrue(b.contains(t1));
        assertTrue(b.contains(t2));
        assertFalse(b.contains(t3));
    }

}
